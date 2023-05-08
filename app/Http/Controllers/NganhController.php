<?php

namespace App\Http\Controllers;

use App\Models\DonVi;
use App\Models\Nganh;
use Illuminate\Http\Request;

class NganhController extends Controller
{
    private $nganhModel;
    private $donViModel;
    public function __construct(Nganh $nganhModel, DonVi $donViModel)
    {
        $this->nganhModel = $nganhModel;
        $this->donViModel = $donViModel;
    }

    // validate
    protected function callValidate(Request $request, $id = null)
    {
        if ($id) {
            $request->validate([
                'ten' => 'required|unique:nganhs' . ',ten,' . $id,
                'donVi_id' => 'numeric|min:1'
            ], [
                'ten.required' => 'Bạn chưa nhập tên ngành',
                'ten.unique' => 'Tên ngành đã tồn tại',
                'donVi_id.min' => 'Bạn chưa chọn đơn vị',
                'donVi_id.numeric' => 'Bạn chưa chọn đơn vị',
            ]);
        } else {
            $request->validate([
                'ten' => 'required|unique:nganhs',
                'donVi_id' => 'numeric|min:1'
            ], [
                'ten.required' => 'Bạn chưa nhập tên ngành',
                'ten.unique' => 'Tên ngành đã tồn tại',
                'donVi_id.min' => 'Bạn chưa chọn đơn vị',
                'donVi_id.numeric' => 'Bạn chưa chọn đơn vị',
            ]);
    }

    }

    // danh sách ngành
    public function index()
    {
        $nganhs = $this->nganhModel->paginate(10);
        $trashCount = count($this->nganhModel->onlyTrashed()->get());
        return view('pages.nganh.index', compact('nganhs', 'trashCount'));
    }

    // form thêm
    public function create()
    {
        $donVis = $this->donViModel->all();
        return view('pages.nganh.create', compact('donVis'));
    }

    // xữ lý thêm
    public function store(Request $request)
    {
        $this->callValidate($request);
        $this->nganhModel->create([
            'ten' => $request->ten,
            'donVi_id' => $request->donVi_id,
        ]);
        return redirect()->route('nganh.index')->with('message', 'Thêm thành công!');
    }

    // form chỉnh sữa
    public function edit($id)
    {
        $nganh = $this->nganhModel->find($id);
        $donVis = $this->donViModel->all();
        return view('pages.nganh.edit', compact('nganh', 'donVis'));
    }

    // xữ lý chỉnh sữa
    public function update(Request $request, $id)
    {
        $this->callValidate($request, $id);
        $this->nganhModel->find($id)->update([
            'ten' => $request->ten,
            'donVi_id' => $request->donVi_id,
        ]);
        return redirect()->route('nganh.index')->with('message', 'Sửa thành công!');
    }

    // xoa vào thùng rác
    public function destroy(Request $request)
    {
        try {
            $this->nganhModel->find($request->id)->delete();
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
        $nganhs = $this->nganhModel->onlyTrashed()->paginate(10);
        return view('pages.nganh.trash', compact('nganhs'));
    }

    //khooi phục
    public function restore(Request $request)
    {
        try {
            $this->nganhModel->onlyTrashed()->find($request->id)->restore();
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
            $this->nganhModel->onlyTrashed()->restore();
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
            $this->nganhModel->onlyTrashed()->find($request->id)->forceDelete();
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

    // xóa tất cã vĩnh viên
    public function forceDestroyAll(Request $request)
    {
        try {
            $this->nganhModel->onlyTrashed()->forceDelete();
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
