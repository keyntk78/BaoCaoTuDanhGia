<?php

namespace App\Http\Controllers;

use App\Models\TieuChuan;
use App\Models\BoTieuChuan;
use Illuminate\Http\Request;

class TieuChuanController extends Controller
{
    private $boTieuChuanModel;
    private $tieuChuanModel;
    public function __construct(TieuChuan $tieuChuanModel, BoTieuChuan $boTieuChuanModel)
    {
        $this->boTieuChuanModel = $boTieuChuanModel;
        $this->tieuChuanModel = $tieuChuanModel;
    }

    protected function callValidate(Request $request, $id = null)
    {
        if ($id) {
            $request->validate([
                'stt' => 'required',
                'ten' => 'required|unique:tieu_chuans' . ',ten,' . $id,
                'boTieuChuan_id' => 'numeric|min:1'
            ], [
                'stt.required' => 'Bạn chưa nhập số thứ tự tiêu chuẩn',
                'ten.required' => 'Bạn chưa nhập tên tiêu chuẩn',
                'ten.unique' => 'Tên tiêu chuẩn đã tồn tại',
                'boTieuChuan_id.min' => 'Bạn chưa chọn bộ tiêu chuẩn',
                'boTieuChuan_id.numeric' => 'Bạn chưa chọn bộ tiêu chuẩn',
            ]);
        } else {
            $request->validate([
                'stt' => 'required',
                'ten' => 'required|unique:tieu_chuans',
                'boTieuChuan_id' => 'numeric|min:1'
            ], [
                'stt.required' => 'Bạn chưa nhập số thứ tự tiêu chuẩn',
                'ten.required' => 'Bạn chưa nhập tên tiêu chuẩn',
                'ten.unique' => 'Tên tiêu chuẩn đã tồn tại',
                'boTieuChuan_id.min' => 'Bạn chưa chọn bộ tiêu chuẩn',
                'boTieuChuan_id.numeric' => 'Bạn chưa chọn bộ tiêu chuẩn',
            ]);
        }

    }

    public function index(Request $request)
    {
        $filterBoTieuChuanId = $request->query('boTieuChuan_id');

        $tieuChuans = $this->tieuChuanModel->sortable('stt');
        $boTieuChuans = $this->boTieuChuanModel->all();
        if (!empty($filterBoTieuChuanId)) {
            $tieuChuans->where('tieu_chuans.boTieuChuan_id', $filterBoTieuChuanId);
        }

        $tieuChuans = $tieuChuans->paginate(10);

        $trashCount = count($this->tieuChuanModel->onlyTrashed()->get());

        return view('pages.tieuchuan.index', compact('tieuChuans', 'trashCount', 'boTieuChuans', 'filterBoTieuChuanId'));
    }

    public function create()
    {
        $boTieuChuans = $this->boTieuChuanModel->all();
        return view('pages.tieuchuan.create', compact('boTieuChuans'));
    }

    public function store(Request $request)
    {
        $this->callValidate($request);
        $this->tieuChuanModel->create([
            'stt' => $request->stt,
            'ten' => $request->ten,
            'boTieuChuan_id' => $request->boTieuChuan_id,
        ]);
        return redirect()->route('tieuchuan.index')->with('message', 'Thêm thành công!');
    }

    public function edit($id)
    {
        $tieuChuan = $this->tieuChuanModel->find($id);
        $boTieuChuans = $this->boTieuChuanModel->all();
        return view('pages.tieuchuan.edit', compact('tieuChuan', 'boTieuChuans'));
    }

    public function update(Request $request, $id)
    {
        $this->callValidate($request, $id);
        $this->tieuChuanModel->find($id)->update([
            'stt' => $request->stt,
            'ten' => $request->ten,
            'boTieuChuan_id' => $request->boTieuChuan_id,
        ]);
        return redirect()->route('tieuchuan.index')->with('message', 'Sửa thành công!');
    }

    public function destroy(Request $request)
    {
        try {
            $this->tieuChuanModel->find($request->id)->delete();
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
        $tieuChuans = $this->tieuChuanModel->onlyTrashed()->paginate(10);
        return view('pages.tieuchuan.trash', compact('tieuChuans'));
    }

    public function restore(Request $request)
    {
        try {
            $this->tieuChuanModel->onlyTrashed()->find($request->id)->restore();
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
            $this->tieuChuanModel->onlyTrashed()->restore();
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
            $this->tieuChuanModel->onlyTrashed()->find($request->id)->forceDelete();
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
            $this->tieuChuanModel->onlyTrashed()->forceDelete();
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
