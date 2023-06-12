<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use Illuminate\Http\Request;

class ChucVuController extends Controller
{
    private $chucVuModel;
    public function __construct(ChucVu $chucVuModel)
    {

        $this->chucVuModel = $chucVuModel;
    }

    protected function callValidate(Request $request, $id = null)
    {
        if ($id) {
            $request->validate([
                'ten' => 'required|unique:chuc_vus' . ',ten,' . $id,
            ], [
                'ten.required' => 'Bạn chưa nhập tên chức vụ',
                'ten.unique' => 'Tên chức vụ đã tồn tại',
            ]);
        } else {
            $request->validate([
                'ten' => 'required|unique:chuc_vus',
            ], [
                'ten.required' => 'Bạn chưa nhập tên chức vụ',
                'ten.unique' => 'Tên chức vụ đã tồn tại',
            ]);
        }
    }

    // danh sách chức vụ
    public function index()
    {
        $chucVus = $this->chucVuModel->paginate(10);
        $trashCount = count($this->chucVuModel->onlyTrashed()->get());
        return view('pages.chucvu.index', compact('chucVus', 'trashCount'));
    }

    // Form thêm chức vụ
    public function create()
    {
        return view('pages.chucvu.create');
    }

    // xử lý thêm
    public function store(Request $request)
    {
        $this->callValidate($request);
        $this->chucVuModel->create([
            'ten' => $request->ten,
        ]);
        return redirect()->route('chucvu.index')->with('message', 'Thêm thành công!');
    }

    // form chỉnh sữa
    public function edit($id)
    {
        $chucVu = $this->chucVuModel->find($id);
        return view('pages.chucvu.edit', compact('chucVu'));
    }

    // xữa lý chỉnh sửa
    public function update(Request $request, $id)
    {
        $this->callValidate($request, $id);
        $this->chucVuModel->find($id)->update([
            'ten' => $request->ten,
        ]);
        return redirect()->route('chucvu.index')->with('message', 'Sửa thành công!');
    }

    // xóa vào thùng rác
    public function destroy(Request $request)
    {
        try {
            $this->chucVuModel->find($request->id)->delete();
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
        $chucVus = $this->chucVuModel->onlyTrashed()->paginate(10);
        return view('pages.chucvu.trash', compact('chucVus'));
    }

    // khôi phục
    public function restore(Request $request)
    {
        try {
            $this->chucVuModel->onlyTrashed()->find($request->id)->restore();
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
            $this->chucVuModel->onlyTrashed()->restore();
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
            $this->chucVuModel->onlyTrashed()->find($request->id)->forceDelete();
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
            $this->chucVuModel->onlyTrashed()->forceDelete();
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
