<?php

namespace App\Http\Controllers;

use App\Models\BoTieuChuan;
use App\Models\CapDanhGia;
use Illuminate\Http\Request;

class BoTieuChuanController extends Controller
{
    private $boTieuChuanModel;
    private $capDanhGiaModel;
    public function __construct(BoTieuChuan $boTieuChuanModel, CapDanhGia $capDanhGiaModel)
    {
        $this->boTieuChuanModel = $boTieuChuanModel;
        $this->capDanhGiaModel = $capDanhGiaModel;
    }
    // validate
    protected function callValidate(Request $request, $id = null)
    {
        if ($id) {
            $request->validate([
                'ten' => 'required|unique:bo_tieu_chuans' . ',ten,' . $id,
                'capDanhGia_id' => 'numeric|min:1'
            ], [
                'ten.required' => 'Bạn chưa nhập tên bộ tiêu chuẩn',
                'ten.unique' => 'Tên bộ tiêu chuẩn đã tồn tại',
                'capDanhGia_id.min' => 'Bạn chưa chọn cấp đánh giá',
                'capDanhGia_id.numeric' => 'Bạn chưa chọn cấp đánh giá',
            ]);
        } else {
            $request->validate([
                'ten' => 'required|unique:tieu_chuans',
                'capDanhGia_id' => 'numeric|min:1'
            ], [
                'ten.required' => 'Bạn chưa nhập tên bộ tiêu chuẩn',
                'ten.unique' => 'Tên bộ tiêu chuẩn đã tồn tại',
                'capDanhGia_id.min' => 'Bạn chưa chọn cấp đánh giá',
                'capDanhGia_id.numeric' => 'Bạn chưa chọn cấp đánh giá',
            ]);
        }

    }

    // danh sách bộ tiêu chuẩn
    public function index()
    {
        $boTieuChuans = $this->boTieuChuanModel->all();
        $trashCount = count($this->boTieuChuanModel->onlyTrashed()->get());
        return view('pages.botieuchuan.index', compact('boTieuChuans', 'trashCount'));
    }

    // form thêm bộ tiêu chuẩn
    public function create()
    {
        $capDanhGias = $this->capDanhGiaModel->all();
        return view('pages.botieuchuan.create', compact('capDanhGias'));
    }

    // xử lý bộ tiêu chuẩn
    public function store(Request $request)
    {
        $this->callValidate($request);
        $this->boTieuChuanModel->create([
            'ten' => $request->ten,
            'capDanhGia_id' => $request->capDanhGia_id,
        ]);
        return redirect()->route('botieuchuan.index')->with('message', 'Thêm thành công!');
    }

    //form chỉnh sửa
    public function edit($id)
    {
        $boTieuChuan = $this->boTieuChuanModel->find($id);
        $capDanhGias = $this->capDanhGiaModel->all();
        return view('pages.botieuchuan.edit', compact('boTieuChuan', 'capDanhGias'));
    }

    // xủ lý chỉnh sửa
    public function update(Request $request, $id)
    {
        $this->callValidate($request, $id);
        $this->boTieuChuanModel->find($id)->update([
            'ten' => $request->ten,
            'capDanhGia_id' => $request->capDanhGia_id,
        ]);
        return redirect()->route('botieuchuan.index')->with('message', 'Sửa thành công!');
    }

    // xử lý xóa vào thùng rác
    public function destroy(Request $request)
    {
        try {
            $this->boTieuChuanModel->find($request->id)->delete();
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

    // danh sách xóa trong thùng rác
    public function trash()
    {
        $boTieuChuans = $this->boTieuChuanModel->onlyTrashed()->paginate(10);
        return view('pages.botieuchuan.trash', compact('boTieuChuans'));
    }

    // khôi phục
    public function restore(Request $request)
    {
        try {
            $this->boTieuChuanModel->onlyTrashed()->find($request->id)->restore();
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

    //khôi phục tất cả
    public function restoreAll(Request $request)
    {
        try {
            $this->boTieuChuanModel->onlyTrashed()->restore();
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

    // xóa vĩnh viễn
    public function forceDestroy(Request $request)
    {
        try {
            $this->boTieuChuanModel->onlyTrashed()->find($request->id)->forceDelete();
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
            $this->boTieuChuanModel->onlyTrashed()->forceDelete();
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
