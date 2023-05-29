<?php

namespace App\Http\Controllers;

use App\Models\BaoCao;
use App\Models\DotDanhGia;
use App\Models\DotDanhGiaGk;
use App\Models\GiaiDoan;
use App\Models\HoatDong;
use App\Models\MinhChung;
use App\Models\Nganh;
use App\Models\TieuChi;
use App\Models\TieuChuan;
use App\Services\HandleUpdateHaveMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DotDanhGiaGiuaKyController extends Controller
{
    private $dotDanhGiaModel;
    private $dotDanhGiaGiuaKyModel;
    private $giaiDoanModel;
    private  $hoatDongModel;

    public function __construct(DotDanhGia $dotDanhGiaModel, DotDanhGiaGk $dotDanhGiaGiuaKy, HoatDong $hoatDongModel, GiaiDoan $giaiDoanModel)
    {
        $this->dotDanhGiaModel = $dotDanhGiaModel;
        $this->dotDanhGiaGiuaKyModel = $dotDanhGiaGiuaKy;
        $this->hoatDongModel = $hoatDongModel;
        $this->giaiDoanModel = $giaiDoanModel;

    }

    protected function callValidate(Request $request, $id = null)
    {
        if ($id) {
            $request->validate([
                'thoiDiemCongNhan' => 'required',
                'tenToChucKiemDinh' => 'required'
            ], [
                'thoiDiemCongNhan.required' => 'Bạn chưa nhập thời điểm công nhận',
                'tenToChucKiemDinh.required' => 'Bạn chưa nhập tên tổ chức kiểm định'
            ]);
        } else {
            $request->validate([
                'thoiDiemCongNhan' => 'required',
                'tenToChucKiemDinh' => 'required'
            ], [
                'thoiDiemCongNhan.required' => 'Bạn chưa nhập thời điểm công nhận',
                'tenToChucKiemDinh.required' => 'Bạn chưa nhập tên tổ chức kiểm định',
            ]);
        }
    }

    public function create($id)
    {
        $dotDanhGia = $this->dotDanhGiaModel->find($id);
        $dotDanhGiaGiuaKy = $this->dotDanhGiaGiuaKyModel->where('dotDanhGia_id', $id)->get();
        $isDanhGiaGK = false;
        $giaiDoans = [];
        if(!$dotDanhGiaGiuaKy->isEmpty()) {
            $isDanhGiaGK = true;
            $giaiDoans = $this->giaiDoanModel
                ->Join('hoat_dongs', 'giai_doans.hoatDong_id', '=', 'hoat_dongs.id')
                ->Join('dot_danh_gias', 'giai_doans.dotDanhGia_id', '=', 'dot_danh_gias.id')
                ->where('dot_danh_gias.id', $id)
                ->where('hoat_dongs.slug', 'bao-cao-giua-ky')
                ->Select('hoat_dongs.ten as tenHoatDong', 'giai_doans.ngayBD as ngayBD', 'giai_doans.ngayKT as ngayKT')
                ->get();
        }
        $hoatDongs = $this->hoatDongModel
            ->where('slug', 'bao-cao-giua-ky')
            ->get();


        $namHocs = [];
        $dotDanhGiaGiuaKys= $this->dotDanhGiaGiuaKyModel->get();
        for ($i = date('Y') - 20; $i < date('Y') + 20; $i++) {
            $namHocs[] = $i;
        }
        return view('pages.dotdanhgiagiuaky.create', compact('dotDanhGia','namHocs', 'isDanhGiaGK', 'dotDanhGiaGiuaKy', 'hoatDongs', 'giaiDoans'));
    }


    public function store(Request $request, $id)
    {
        $this->callValidate($request);
        try {
            DB::beginTransaction();
            $dotDanhGiaGiuaKy = $this->dotDanhGiaGiuaKyModel->create([
                'tenDotDanhGia' => $request->tenDotDanhGia,
                'namHoc' => $request->namHoc,
                'thoiDiemCongNhan' => $request->thoiDiemCongNhan,
                'tenToChucKiemDinh' => $request->tenToChucKiemDinh,
                'dotDanhGia_id' => $id,
                'trangThai' => 0,
            ]);

            if (!empty($request->hoatDong_id)) {
                foreach ($request->hoatDong_id as $key => $item) {
                    $this->giaiDoanModel->create([
                        'ngayBD' => $request->ngayBD[$key],
                        'ngayKT' => $request->ngayKT[$key],
                        'hoatDong_id' => $item,
                        'dotDanhGia_id' => $id
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('dotdanhgiagiuaky.create', ['id' => $id])->with('message', 'Thêm thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
        }
    }

    public function edit($id)
    {
        $dotDanhGiaGk = $this->dotDanhGiaGiuaKyModel->find($id);
        $hoatDongs = $this->hoatDongModel
            ->where('slug', 'bao-cao-giua-ky')
            ->get();

        $dotDanhGia = $this->dotDanhGiaModel->find($dotDanhGiaGk->dotDanhGia_id);
        $namHocs = [];
        for ($i = date('Y') - 20; $i < date('Y') + 20; $i++) {
            $namHocs[] = $i;
        }
        $current_hoatDongs = [];
        $current_ngayBD = [];
        $current_ngayKT = [];
        $slug = [];
        $hoatDongCurrent = $dotDanhGia->hoatDong->where('slug', 'bao-cao-giua-ky');
        foreach ($hoatDongCurrent as $item) {
            array_push($current_hoatDongs, $item->id);
            array_push($current_ngayBD, $item->pivot->ngayBD);
            array_push($current_ngayKT, $item->pivot->ngayKT);
        }
        return view('pages.dotdanhgiagiuaky.edit', compact('dotDanhGiaGk', 'namHocs',  'hoatDongs', 'current_hoatDongs', 'current_ngayBD', 'current_ngayKT'));
    }

    public function update(Request $request, $id)
    {
        $this->callValidate($request, $id);
        try {
            DB::beginTransaction();
            $dotDanhGiaGk = $this->dotDanhGiaGiuaKyModel->find($id);

            $dotDanhGiaGk->update([
                'thoiDiemCongNhan' => $request->thoiDiemCongNhan,
                'tenToChucKiemDinh' => $request->thoiDiemCongNhan,
                'namHoc' => $request->namHoc,
            ]);
            $giaiDoans = $this->giaiDoanModel->where('dotDanhGia_id', $dotDanhGiaGk->dotDanhGia_id)->get();
            HandleUpdateHaveMany::handleUpdateGiaiDoan($giaiDoans, $dotDanhGiaGk->dotDanhGia_id, $request, $this->giaiDoanModel);
            DB::commit();
            return redirect()->route('dotdanhgiagiuaky.create', ['id' => $dotDanhGiaGk->dotDanhGia_id])->with('message', 'Sửa thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
        }
    }

    public function finish(Request $request)
    {
        try {
            $this->dotDanhGiaGiuaKyModel->find($request->id)->update([
                'trangThai' => 1
            ]);
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }

    public function reopen(Request $request)
    {
        try {
            $this->dotDanhGiaGiuaKyModel->find($request->id)->update([
                'trangThai' => 0
            ]);
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}
