<?php

namespace App\Http\Controllers;

use App\Models\NganhDotDanhGia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\DotDanhGia;
use App\Models\GiaiDoan;
use App\Models\Nganh;
use App\Models\HoatDong;
use App\Models\BaoCao;
use App\Models\TieuChuan;
use App\Models\MinhChung;
use App\Models\TieuChi;
use App\Services\HandleUpdateHaveMany;

class DotDanhGiaController extends Controller
{
    private $dotDanhGiaModel;
    private $nganhModel;
    private $giaiDoanModel;
    private $hoatDongModel;
    private $baoCaoModel;
    private $tieuChuanModel;
    private $nganhDotDanhGiaModel;
    private $tieuChiModel;
    public function __construct(MinhChung $minhChungModel,NganhDotDanhGia $nganhDotDanhGiaModel,TieuChi $tieuChiModel, TieuChuan $tieuChuanModel, BaoCao $baoCaoModel, DotDanhGia $dotDanhGiaModel, Nganh $nganhModel, GiaiDoan $giaiDoanModel, HoatDong $hoatDongModel)
    {
        $this->dotDanhGiaModel = $dotDanhGiaModel;
        $this->nganhModel = $nganhModel;
        $this->giaiDoanModel = $giaiDoanModel;
        $this->hoatDongModel = $hoatDongModel;
        $this->baoCaoModel = $baoCaoModel;
        $this->tieuChiModel = $tieuChiModel;
        $this->tieuChuanModel = $tieuChuanModel;
        $this->minhChungModel = $minhChungModel;
        $this->nganhDotDanhGiaModel = $nganhDotDanhGiaModel;
    }

    protected function callValidate(Request $request, $id = null)
    {
        if ($id) {
            $request->validate([
                'ten' => 'required|unique:dot_danh_gias' . ',ten,' . $id,
            ], [
                'ten.required' => 'Bạn chưa nhập tên đợt đánh giá',
                'ten.unique' => 'Tên đợt đánh giá đã tồn tại',
            ]);
        } else {
            $request->validate([
                'ten' => 'required|unique:dot_danh_gias',
            ], [
                'ten.required' => 'Bạn chưa nhập tên đợt đánh giá',
                'ten.unique' => 'Tên đợt đánh giá đã tồn tại',
            ]);
        }
    }

    public function index()
    {
        $dotDanhGias = $this->dotDanhGiaModel->all();
        $trashCount = count($this->dotDanhGiaModel->onlyTrashed()->get());
        return view('pages.dotdanhgia.index', compact('dotDanhGias', 'trashCount'));
    }

    public function create()
    {
        $nganhs = $this->nganhModel->all();
        $hoatDongs = $this->hoatDongModel->where('slug', '!=', 'bao-cao-giua-ky')->get();
        $namHocs = [];
        for ($i = date('Y') - 20; $i < date('Y') + 20; $i++) {
            $namHocs[] = $i;
        }
        return view('pages.dotdanhgia.create', compact('nganhs', 'namHocs', 'hoatDongs'));
    }

    public function store(Request $request)
    {
        $this->callValidate($request);
        $dotDanhGias = $this->dotDanhGiaModel
            ->Join('nganh_dot_danh_gias', 'dotDanhGia_id', '=', 'dot_danh_gias.id')
            ->where('namHoc', $request->namHoc)->get();
        foreach ($dotDanhGias as $dotDanhGia){
            foreach ($request->nganh as $item){
                if($item == $dotDanhGia->nganh_id){
                    return redirect()->back()->with('message', 'Ngành trong đợt đánh giá này đã tồn tại tròng năm này!');
                }
            }
        }
        try {
            DB::beginTransaction();
            $dotDanhGia = $this->dotDanhGiaModel->create([
                'ten' => $request->ten,
                'namHoc' => $request->namHoc,
                'giaiDoan' => $request->giaiDoan,
                'trangThai' => 0,
            ]);
            $nganhIds = !empty($request->nganh) ? $request->nganh : [];
            $dotDanhGia->nganh()->attach($nganhIds);
            if (!empty($request->hoatDong_id)) {
                foreach ($request->hoatDong_id as $key => $item) {
                    $this->giaiDoanModel->create([
                        'ngayBD' => $request->ngayBD[$key],
                        'ngayKT' => $request->ngayKT[$key],
                        'hoatDong_id' => $item,
                        'dotDanhGia_id' => $dotDanhGia->id
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('dotdanhgia.index')->with('message', 'Thêm thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
        }
    }

    public function show($id)
    {

        $tieuChuans = $this->tieuChuanModel->where('boTieuChuan_id', 1)->get();
        $dotDanhGia = $this->dotDanhGiaModel->find($id);
        $nganhs = $dotDanhGia->nganh;

        $nganhCongKhais = [];
        foreach ($nganhs as $nganh) {
            $baoCaos = $this->baoCaoModel->where('nganh_id', $nganh->id)
                    ->where('dotDanhGia_id', $id)
                    ->where('congKhai', 1)->get();
            if (count($baoCaos) > 0) {
                $tieuChuanFounded = [];
                foreach ($tieuChuans as $tieuChuan) {
                    $baoCao = $tieuChuan->tieuChi[0]->baoCao->where('nganh_id', $nganh->id)
                            ->where('dotDanhGia_id', $id)
                            ->where('congKhai', 1)->first();
                    $completedBaoCaos = $this->baoCaoModel->where('nganh_id', $nganh->id)
                            ->where('tieuChuan_id', $tieuChuan->id)
                            ->where('dotDanhGia_id', $id)
                            ->where('trangThai', 1)->get();
                    $tieuChuanFounded[] = (object) [
                        'stt' => $tieuChuan->stt,
                        'tongSoTC' => !empty($baoCao->tongSoTC) ? $baoCao->tongSoTC : 0,
                        'soTCDat' => !empty($baoCao->soTCDat) ? $baoCao->soTCDat : 0,
                        'per' => !empty($baoCao->soTCDat) && !empty($baoCao->tongSoTC) ?  $baoCao->soTCDat / $baoCao->tongSoTC * 100 : 0,
                        'tienDo' => !empty($baoCao->tongSoTC) ? count($completedBaoCaos) / ($baoCao->tongSoTC + 1) * 100 : 0,
                    ];

                }
                $founded = (object)[
                    'nganh_id' => $nganh->id,
                    'dotDanhGia_id' => $id,
                    'tenNganh' => $nganh->ten,
                    'tieuChuans' => $tieuChuanFounded
                ];
                array_push($nganhCongKhais, $founded);
            }
        }
        return view('pages.dotdanhgia.show', compact('dotDanhGia', 'nganhCongKhais'));
    }

    public function showBaoCao($dotDanhGia_id, $nganh_id)
    {
        $nganh = DotDanhGia::orderBy('namHoc')
                        ->join('nganh_dot_danh_gias', 'nganh_dot_danh_gias.dotDanhGia_id', '=', 'dot_danh_gias.id')
                        ->join('nganhs', 'nganhs.id', '=', 'nganh_dot_danh_gias.nganh_id')
                        ->where('nganh_dot_danh_gias.nganh_id', $nganh_id)->first();
        $tieuChuans = $this->tieuChuanModel->all();
        $needle = '<a class="is-minhchung" style="color: #000; font-weight: bold; text-decoration: none;"';
        $from = 'target="_blank" rel="nofollow noopener">';
        $to = '</a>';
        $hopMCs = array();
        foreach ($tieuChuans as $tieuChuan) {
            foreach ($tieuChuan->tieuChi as $key => $tieuChi) {
                if ($key == 0) {
                    continue;
                }
                $baoCao = $tieuChi->baoCao->where('nganh_id', $nganh->id)->where('dotDanhGia_id', $nganh->dotDanhGia_id)->first();
                if (!empty($baoCao)) {
                    $html = $baoCao->moTa;
                    $lastPos = 0;
                    $key = 1;
                    while (($lastPos = strpos($html, $needle, $lastPos))!== false) {
                        $textFrom = strpos($html, $from, $lastPos);
                        $textTo = strpos($html, $to, $lastPos);
                        $text = html_entity_decode(substr($html, $textFrom + strlen($from) + 1, $textTo - $textFrom - strlen($from) - 2));
                        $minhChung = $this->minhChungModel->where('ten', $text)->first();
                        $existMC = array_filter(
                            $hopMCs,
                            function ($e) use (&$text) {
                                return $e->text == $text;
                            }
                        );
                        if (!empty($existMC) && count($existMC) > 0) {
                            $found = array_pop($existMC);
                            $maHMC = $found->maHMC;
                        } else {
                            $maHMC = 'H'.$tieuChuan->stt.'.'.sprintf("%02d", $tieuChuan->stt).'.'.sprintf("%02d", $tieuChi->stt).'.'.sprintf("%02d", $key);
                            $key++;
                        }
                        $hopMCs[] = (object) [
                            'text' => $text,
                            'minhChung_id' => $minhChung->id,
                            'tieuChuan_id' => $tieuChuan->id,
                            'tieuChi_id' => $tieuChi->id,
                            'baoCao_id' => $baoCao->id,
                            'nganh_id' => $nganh->nganh_id,
                            'dotDanhGia_id' => $nganh->dotDanhGia_id,
                            'maHMC' => $maHMC,
                            'link' => $minhChung->link,
                        ];
                        $lastPos = $lastPos + strlen($needle);
                    }
                }
            }
        }
        $dotDanhGia = $this->dotDanhGiaModel->find($dotDanhGia_id);
        return view('pages.dotdanhgia.showbaocao', compact('dotDanhGia', 'nganh', 'tieuChuans', 'hopMCs'));
    }

    public function edit($id)
    {
        $dotDanhGia = $this->dotDanhGiaModel->find($id);
        $nganhs = $this->nganhModel->all();
        $hoatDongs = $this->hoatDongModel->all();
        $namHocs = [];
        for ($i = date('Y') - 20; $i < date('Y') + 20; $i++) {
            $namHocs[] = $i;
        }
        $current_hoatDongs = [];
        $current_ngayBD = [];
        $current_ngayKT = [];
        foreach ($dotDanhGia->hoatDong as $item) {
            array_push($current_hoatDongs, $item->id);
            array_push($current_ngayBD, $item->pivot->ngayBD);
            array_push($current_ngayKT, $item->pivot->ngayKT);
        }
        return view('pages.dotdanhgia.edit', compact('dotDanhGia', 'nganhs', 'namHocs', 'hoatDongs', 'current_hoatDongs', 'current_ngayBD', 'current_ngayKT'));
    }

    public function update(Request $request, $id)
    {
        $this->callValidate($request, $id);
        try {
            DB::beginTransaction();
            $dotDanhGia = $this->dotDanhGiaModel->find($id);
            $dotDanhGia->update([
                'ten' => $request->ten,
                'namHoc' => $request->namHoc,
                'giaiDoan' => $request->giaiDoan,
            ]);
            $nganhIds = !empty($request->nganh) ? $request->nganh : [];
            $dotDanhGia->nganh()->sync($nganhIds);
            $giaiDoans = $this->giaiDoanModel->where('dotDanhGia_id', $id)->get();
            HandleUpdateHaveMany::handleUpdateGiaiDoan($giaiDoans, $id, $request, $this->giaiDoanModel);
            DB::commit();
            return redirect()->route('dotdanhgia.show', ['id' => $id])->with('message', 'Sửa thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $this->dotDanhGiaModel->find($request->id)->delete();
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

    public function finish(Request $request)
    {
        try {
            $this->dotDanhGiaModel->find($request->id)->update([
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
            $this->dotDanhGiaModel->find($request->id)->update([
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

    public function trash()
    {
        $dotDanhGias = $this->dotDanhGiaModel->onlyTrashed()->paginate(10);
        return view('pages.dotdanhgia.trash', compact('dotDanhGias'));
    }

    public function restore(Request $request)
    {
        try {
            $this->dotDanhGiaModel->onlyTrashed()->find($request->id)->restore();
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

    public function restoreAll(Request $request)
    {
        try {
            $this->dotDanhGiaModel->onlyTrashed()->restore();
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

    public function forceDestroy(Request $request)
    {
        try {
            $dotDanhGia = $this->dotDanhGiaModel->onlyTrashed()->find($request->id);
            $giaiDoans = $this->giaiDoanModel->where('dotDanhGia_id', '=', $request->id);

            $dotDanhGia->nganh()->detach();
            $dotDanhGia->hoatDong()->detach();

            $dotDanhGia->forceDelete();
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

    public function forceDestroyAll(Request $request)
    {
        try {
            $dotDanhGias = $this->dotDanhGiaModel->onlyTrashed()->get();
            foreach ($dotDanhGias as $dotDanhGia) {
                $dotDanhGia->nganh()->detach();
                $dotDanhGia->hoatDong()->detach();
            }
            $this->dotDanhGiaModel->onlyTrashed()->forceDelete();
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
