<?php

namespace App\Http\Controllers;

use App\Models\BoTieuChuan;
use App\Models\TieuChi;
use App\Models\TieuChuan;
use App\Models\YeuCau;
use App\Models\MocChuan;
use App\Models\TuKhoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\HandleUpdateHaveMany;

class TieuChiController extends Controller
{
    private $tieuChiModel;
    private $tieuChuanModel;
    private $yeuCauModel;
    private $mocChuanModel;
    private $tuKhoaModel;
    private $boTieuChuanModel;
    public function __construct(TieuChi $tieuChiModel, TieuChuan $tieuChuanModel,
        YeuCau $yeuCauModel, MocChuan $mocChuanModel, TuKhoa $tuKhoaModel, BoTieuChuan $boTieuChuanModel)
    {
        $this->tieuChiModel = $tieuChiModel;
        $this->tieuChuanModel = $tieuChuanModel;
        $this->yeuCauModel = $yeuCauModel;
        $this->mocChuanModel = $mocChuanModel;
        $this->tuKhoaModel = $tuKhoaModel;
        $this->boTieuChuanModel = $boTieuChuanModel;

    }

    // validate
    protected function callValidate(Request $request, $id = null)
    {

        if ($id) {
            $request->validate([
                'stt' => 'required',
                'ten' => 'required|unique:tieu_chis' . ',ten,' . $id,
                'tieuChuan_id' => 'required|numeric|min:1'
            ], [
                'stt.required' => 'Bạn chưa nhập số thứ tự tiêu chí',
                'ten.required' => 'Bạn chưa nhập tên tiêu chí',
                'ten.unique' => 'Tên tiêu chí đã tồn tại',
                'tieuChuan_id.min' => 'Bạn chưa chọn tiêu chuẩn',
                'tieuChuan_id.numeric' => 'Bạn chưa chọn tiêu chuẩn',
                'tieuChuan_id.required' => 'Bạn chưa chọn tiêu chuẩn',
            ]);
        } else {
            $request->validate([
                'stt' => 'required',
                'ten' => 'required|unique:tieu_chis',
                'tieuChuan_id' => 'required|numeric|min:1'
            ], [
                'stt.required' => 'Bạn chưa nhập số thứ tự tiêu chí',
                'ten.required' => 'Bạn chưa nhập tên tiêu chí',
                'ten.unique' => 'Tên tiêu chí đã tồn tại',
                'tieuChuan_id.required' => 'Bạn chưa chọn tiêu chuẩn',
                'tieuChuan_id.min' => 'Bạn chưa chọn tiêu chuẩn',
                'tieuChuan_id.numeric' => 'Bạn chưa chọn tiêu chuẩn',
            ]);
        }

    }

    // danh sách tiêu chí
    public function index(Request $request)
    {
        $filterStt = $request->query('stt');
        $filterTen = $request->query('ten');
        $filterTieuChuanId = $request->query('tieuChuan_id');
        $filterBoTieuChuanId = $request->query('boTieuChuan_id');
        $tieuChis = $this->tieuChiModel->sortable(['tieuChuan.stt', 'stt']);
        if (!empty($filterStt)) {
            $tieuChis->where('tieu_chis.stt', $filterStt);
        }
        if (!empty($filterTen)) {
            $tieuChis->where('tieu_chis.ten', 'like', '%'.$filterTen.'%');
        }

        if (!empty($filterBoTieuChuanId)) {
            $tieuChis->where('tieu_chis.tieuChuan_id', $filterTieuChuanId);
        }
        if (!empty($filterTieuChuanId)) {
            $tieuChis->where('tieu_chis.tieuChuan_id', $filterTieuChuanId);
        }
        $boTieuChuans = $this->boTieuChuanModel->all();
        $tieuChis = $tieuChis->paginate(10);
        $trashCount = count($this->tieuChiModel->onlyTrashed()->get());
        $tieuChuan = $this->tieuChuanModel->find($filterTieuChuanId);


        return view('pages.tieuchi.index', compact('tieuChis', 'trashCount', 'tieuChuan', 'filterStt' ,'filterTen',
            'filterTieuChuanId', 'boTieuChuans', 'filterBoTieuChuanId'));
    }

    //form thêm tiêu chí
    public function create()
    {
        $tieuChuans = $this->tieuChuanModel->all();
        $boTieuChuans = $this->boTieuChuanModel->all();
        return view('pages.tieuchi.create', compact('tieuChuans', 'boTieuChuans'));
    }

    //xử lý thêm
    public function store(Request $request)
    {
        $this->callValidate($request);
        try {
            DB::beginTransaction();
            $tieuChi = $this->tieuChiModel->create([
                'stt' => $request->stt,
                'ten' => $request->ten,
                'tieuChuan_id' => $request->tieuChuan_id,
                'ghiChu' => $request->ghiChu
            ]);
            if (!empty($request->yeuCau)) {
                foreach ($request->yeuCau as $item) {
                    $this->yeuCauModel->create([
                        'noiDung' => $item,
                        'tieuChi_id' => $tieuChi->id
                    ]);
                }
            }
            if (!empty($request->mocChuan)) {
                foreach ($request->mocChuan as $item) {
                    $this->mocChuanModel->create([
                        'noiDung' => $item,
                        'tieuChi_id' => $tieuChi->id]
                    );
                }
            }
            $tuKhoaIds = [];
            if (!empty($request->tuKhoa)) {
                foreach ($request->tuKhoa as $item) {
                    $tuKhoa = $this->tuKhoaModel->firstOrCreate(['noiDung' => $item]);
                    $tuKhoaIds[] = $tuKhoa->id;
                }
            }
            $tieuChi->tuKhoa()->attach($tuKhoaIds);
            DB::commit();
            return redirect()->route('tieuchi.index')->with('message', 'Thêm thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
        }
    }

    // Chiêt tiết tiêu chí
    public function show($id)
    {
        $tieuChi = $this->tieuChiModel->find($id);
        return view('pages.tieuchi.show', compact('tieuChi'));
    }

    //form chỉnh sữa
    public function edit($id)
    {

        $tieuChi = $this->tieuChiModel
            ->join('tieu_chuans','tieu_chuans.id', '=', 'tieu_chis.tieuChuan_id')
            ->where('tieu_chis.id', $id)
            ->select('tieu_chis.*', 'tieu_chuans.ten as tenTieuChuan', 'tieu_chuans.stt as sttTieuChuan', 'tieu_chuans.boTieuChuan_id')
            ->get()[0];
        $tieuChuans = $this->tieuChuanModel->all();
        $boTieuChuans = $this->boTieuChuanModel->all();
        return view('pages.tieuchi.edit', compact('tieuChi', 'tieuChuans', 'boTieuChuans'));
    }

    // xữ lý chỉnh sửa
    public function update(Request $request, $id)
    {
        $this->callValidate($request, $id);

        try {
            DB::beginTransaction();
            $tieuChi = $this->tieuChiModel->find($id);
            $tieuChi->update([
                'stt' => $request->stt,
                'ten' => $request->ten,
                'tieuChuan_id' => $request->tieuChuan_id,
                'ghiChu' => $request->ghiChu
            ]);



            $yeuCaus = $this->yeuCauModel->where('tieuChi_id', $id)->get();
            HandleUpdateHaveMany::handleUpdateYeuCau($yeuCaus, $id, $request, $this->yeuCauModel);

            $mocChuans = $this->mocChuanModel->where('tieuChi_id', $id)->get();
            HandleUpdateHaveMany::handleUpdateMocChuan($mocChuans, $id, $request, $this->mocChuanModel);
            $tuKhoaIds = [];
            if (!empty($request->tuKhoa)) {
                foreach ($request->tuKhoa as $item) {
                    $tuKhoa = $this->tuKhoaModel->firstOrCreate(['noiDung' => $item]);
                    $tuKhoaIds[] = $tuKhoa->id;
                }
            }
            $tieuChi->tuKhoa()->sync($tuKhoaIds);
            DB::commit();
            return redirect()->route('tieuchi.show', ['id' => $id])->with('message', 'Sửa thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
        }
    }

    //xóa vào thùng rác
    public function destroy(Request $request)
    {
        try {
            $this->tieuChiModel->find($request->id)->delete();
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

    // danh sách trong thùng rác
    public function trash()
    {
        $tieuChis = $this->tieuChiModel->onlyTrashed()->paginate(10);
        return view('pages.tieuchi.trash', compact('tieuChis'));
    }

    //khôi phục
    public function restore(Request $request)
    {
        try {
            $this->tieuChiModel->onlyTrashed()->find($request->id)->restore();
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

    // khôi phục tất cả
    public function restoreAll(Request $request)
    {
        try {
            $this->tieuChiModel->onlyTrashed()->restore();
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

    //xoasa vĩnh viễn
    public function forceDestroy(Request $request)
    {
        try {
            $tieuChi = $this->tieuChiModel->onlyTrashed()->find($request->id);
            $tieuChi->yeuCau()->forceDelete();
            $tieuChi->mocChuan()->forceDelete();
            $tieuChi->tuKhoa()->detach();
            $tieuChi->forceDelete();
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

    // xóa tất cả vĩnh viễn
    public function forceDestroyAll(Request $request)
    {
        try {
            $tieuChis = $this->tieuChiModel->onlyTrashed()->get();
            foreach ($tieuChis as $tieuChi) {
                $tieuChi->yeuCau()->forceDelete();
                $tieuChi->mocChuan()->forceDelete();
                $tieuChi->tuKhoa()->detach();
            }
            $this->tieuChiModel->onlyTrashed()->forceDelete();
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

    //Danh sách tiêu chuẩn them bộ chức năng lọc tiêu chuẩn
    public  function handleSelectTieuChuan($id){
        $tieuChuans = $this->tieuChuanModel->where('boTieuChuan_Id', $id)->get();
        return response()->json([
            'tieuChuans' => $tieuChuans
        ], 200);
    }

}
