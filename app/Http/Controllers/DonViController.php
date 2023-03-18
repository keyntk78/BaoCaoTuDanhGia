<?php

namespace App\Http\Controllers;

use App\Models\DonVi;
use Illuminate\Http\Request;

class DonViController extends Controller
{
    private $donViModel;
    public function __construct(DonVi $donViModel)
    {
        $this->donViModel = $donViModel;
    }

    protected function callValidate(Request $request, $id = null)
    {
        if ($id) {
            $request->validate([
                'ten' => 'required|unique:don_vis' . ',ten,' . $id,
            ], [
                'ten.required' => 'Bạn chưa nhập tên đơn vị',
                'ten.unique' => 'Tên đơn vị đã tồn tại',
            ]);
        } else {
            $request->validate([
                'ten' => 'required|unique:don_vis',
            ], [
                'ten.required' => 'Bạn chưa nhập tên đơn vị',
                'ten.unique' => 'Tên đơn vị đã tồn tại',
            ]);
        }
    }

    public function index()
    {
        $donVis = $this->donViModel->paginate(10);
        $trashCount = count($this->donViModel->onlyTrashed()->get());
        return view('pages.donvi.index', compact('donVis', 'trashCount'));
    }

    public function create()
    {
        return view('pages.donvi.create');
    }

    public function store(Request $request)
    {
        $this->callValidate($request);
        $this->donViModel->create([
            'ten' => $request->ten,
        ]);
        return redirect()->route('donvi.index')->with('message', 'Thêm thành công!');
    }

    public function edit($id)
    {
        $donVi = $this->donViModel->find($id);
        return view('pages.donvi.edit', compact('donVi'));
    }

    public function update(Request $request, $id)
    {
        $this->callValidate($request, $id);
        $this->donViModel->find($id)->update([
            'ten' => $request->ten,
        ]);
        return redirect()->route('donvi.index')->with('message', 'Sửa thành công!');
    }

    public function destroy(Request $request)
    {
        try {
            $this->donViModel->find($request->id)->delete();
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
        $donVis = $this->donViModel->onlyTrashed()->paginate(10);
        return view('pages.donvi.trash', compact('donVis'));
    }

    public function restore(Request $request)
    {
        try {
            $this->donViModel->onlyTrashed()->find($request->id)->restore();
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
            $this->donViModel->onlyTrashed()->restore();
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
            $this->donViModel->onlyTrashed()->find($request->id)->forceDelete();
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
            $this->donViModel->onlyTrashed()->forceDelete();
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
