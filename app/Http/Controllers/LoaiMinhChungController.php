<?php

namespace App\Http\Controllers;

use App\Models\LoaiMinhChung;
use Illuminate\Http\Request;

class LoaiMinhChungController extends Controller
{
    private $loaiMinhChungModel;

    public function __construct(LoaiMinhChung $loaiMinhChungModel)
    {
        $this->loaiMinhChungModel = $loaiMinhChungModel;
    }

    // validate
    protected function callValidate(Request $request, $id = null)
    {
        if ($id) {
            $request->validate([
                'ten' => 'required|unique:loai_minh_chungs' . ',ten,' . $id,
            ], [
                'ten.required' => 'Bạn chưa nhập tên loại minh chứng ',
                'ten.unique' => 'Tên loại minh chứng đã tồn tại',
            ]);
        } else {
            $request->validate([
                'ten' => 'required|unique:loai_minh_chungs',
            ], [
                'ten.required' => 'Bạn chưa nhập tên loại minh chứng',
                'ten.unique' => 'Tên loại minh chứng đã tồn tại',
            ]);
        }

    }

    // danh sách loại minh chứng
    public function index()
    {
        $loaiMinhChungs = $this->loaiMinhChungModel->all();
        $trashCount = count($this->loaiMinhChungModel->onlyTrashed()->get());
        return view('pages.loaiminhchung.index', compact('loaiMinhChungs', 'trashCount'));
    }

    // form thêm
    public function create()
    {
        return view('pages.loaiminhchung.create');
    }

    // xữ lý thêm
    public function store(Request $request)
    {
        $this->callValidate($request);
        $this->loaiMinhChungModel->create([
            'ten' => $request->ten,
        ]);
        return redirect()->route('loaiminhchung.index')->with('message', 'Thêm thành công!');
    }

    // form chỉnh sữa
    public function edit($id)
    {
        $loaiMinhChung = $this->loaiMinhChungModel->find($id);
        return view('pages.loaiminhchung.edit', compact('loaiMinhChung'));
    }

    // xuwx lý chỉnh sữa
    public function update(Request $request, $id)
    {
        $this->callValidate($request, $id);
        $this->loaiMinhChungModel->find($id)->update([
            'ten' => $request->ten,
        ]);
        return redirect()->route('loaiminhchung.index')->with('message', 'Sửa thành công!');
    }

    // xóa vào thùng rác
    public function destroy(Request $request)
    {
        try {
            $this->loaiMinhChungModel->find($request->id)->delete();
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

    // thùng rác
    public function trash()
    {
        $loaiMinhChungs = $this->loaiMinhChungModel->onlyTrashed()->paginate(10);
        return view('pages.loaiminhchung.trash', compact('loaiMinhChungs'));
    }

    // khôi phục
    public function restore(Request $request)
    {
        try {
            $this->loaiMinhChungModel->onlyTrashed()->find($request->id)->restore();
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
            $this->loaiMinhChungModel->onlyTrashed()->restore();
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
            $this->loaiMinhChungModel->onlyTrashed()->find($request->id)->forceDelete();
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

    //xóa tâất cả vĩnh viễn
    public function forceDestroyAll(Request $request)
    {
        try {
            $this->loaiMinhChungModel->onlyTrashed()->forceDelete();
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
