<?php

namespace App\Http\Controllers;

use App\Models\CapDanhGia;
use Illuminate\Http\Request;

class CapDanhGiaController extends Controller
{
    private $capDanhGiaModel;
    public function __construct(CapDanhGia $capDanhGiaModel)
    {
        $this->capDanhGiaModel = $capDanhGiaModel;
    }

    //validate
    protected function callValidate(Request $request, $id = null)
    {
        if ($id) {
            $request->validate([
                'ten' => 'required|unique:cap_danh_gias' . ',ten,' . $id,
            ], [
                'ten.required' => 'Bạn chưa nhập tên cấp đánh giá',
                'ten.unique' => 'Tên cấp đánh giá đã tồn tại',
            ]);
        } else {
            $request->validate([
                'ten' => 'required|unique:cap_danh_gias',
            ], [
                'ten.required' => 'Bạn chưa nhập tên cấp đánh giá',
                'ten.unique' => 'Tên cấp đánh giá đã tồn tại',
            ]);
        }

    }

    //danh sách cấp đánh giá
    public function index()
    {
        $capDanhGias = $this->capDanhGiaModel->all();
        $trashCount = count($this->capDanhGiaModel->onlyTrashed()->get());
        return view('pages.capdanhgia.index', compact('capDanhGias', 'trashCount'));
    }

    // form thêm cấp ánh giá
    public function create()
    {
        return view('pages.capdanhgia.create');
    }

    // xử lý thêm câấp đánh giá
    public function store(Request $request)
    {
        $this->callValidate($request);
        $this->capDanhGiaModel->create([
            'ten' => $request->ten,
        ]);
        return redirect()->route('capdanhgia.index')->with('message', 'Thêm thành công!');
    }

    //form chỉnh sữa
    public function edit($id)
    {
        $capDanhGia = $this->capDanhGiaModel->find($id);
        return view('pages.capdanhgia.edit', compact('capDanhGia'));
    }

    // Xử lý chỉnh sửa
    public function update(Request $request, $id)
    {
        $this->callValidate($request, $id);
        $this->capDanhGiaModel->find($id)->update([
            'ten' => $request->ten,
        ]);
        return redirect()->route('capdanhgia.index')->with('message', 'Sửa thành công!');
    }

    // Xử lý xóa vào thùng rác
    public function destroy(Request $request)
    {
        try {
            $this->capDanhGiaModel->find($request->id)->delete();
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

    // Danh sách cấp đánh giá trong thùng rác
    public function trash()
    {
        $capDanhGias = $this->capDanhGiaModel->onlyTrashed()->paginate(10);
        return view('pages.capdanhgia.trash', compact('capDanhGias'));
    }

    // xử lý khôi phục
    public function restore(Request $request)
    {
        try {
            $this->capDanhGiaModel->onlyTrashed()->find($request->id)->restore();
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

    // Xử lý khôi phục tất cả
    public function restoreAll(Request $request)
    {
        try {
            $this->capDanhGiaModel->onlyTrashed()->restore();
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

    //xóa vĩnh viễn
    public function forceDestroy(Request $request)
    {
        try {
            $this->capDanhGiaModel->onlyTrashed()->find($request->id)->forceDelete();
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

    // xóa vĩnh viễn tất cả
    public function forceDestroyAll(Request $request)
    {
        try {
            $this->capDanhGiaModel->onlyTrashed()->forceDelete();
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
