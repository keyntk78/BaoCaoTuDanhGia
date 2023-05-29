<?php

namespace App\Http\Controllers;

use App\Models\TieuChuan;
use App\Models\BoTieuChuan;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Illuminate\Validation\Rule;

class TieuChuanController extends Controller
{
    private $boTieuChuanModel;
    private $tieuChuanModel;
    public function __construct(TieuChuan $tieuChuanModel, BoTieuChuan $boTieuChuanModel)
    {
        $this->boTieuChuanModel = $boTieuChuanModel;
        $this->tieuChuanModel = $tieuChuanModel;
    }

    // validate
    protected function callValidate(Request $request, $id = null)
    {

        if ($id) {
            $request->validate([
                'stt' => ['required',Rule::unique('tieu_chuans')->where(function ($query) use ($request, $id){
                    return $query->where('boTieuChuan_id', $request->input('boTieuChuan_id'))
                        ->where('id', '!=',$id);
                })],
                'ten' => ['required',Rule::unique('tieu_chuans')->where(function ($query) use ($request, $id){
                    return $query->where('boTieuChuan_id', $request->input('boTieuChuan_id'))
                        ->where('id', '!=',$id);
                })],
                'boTieuChuan_id' => 'numeric|min:1'
            ], [
                'stt.required' => 'Bạn chưa nhập số thứ tự tiêu chuẩn',
                'stt.unique' =>'Số thứ tự tiêu chuẩn đã tồn tại',
                'ten.required' => 'Bạn chưa nhập tên tiêu chuẩn',
                'ten.unique' => 'Tên tiêu chuẩn đã tồn tại',
                'boTieuChuan_id.min' => 'Bạn chưa chọn bộ tiêu chuẩn',
                'boTieuChuan_id.numeric' => 'Bạn chưa chọn bộ tiêu chuẩn',
            ]);
        } else {
            $request->validate([
                'stt' => ['required',Rule::unique('tieu_chuans')->where(function ($query) use ($request) {
                    return $query->where('boTieuChuan_id', $request->input('boTieuChuan_id'));
                })],
                'ten' => ['required',Rule::unique('tieu_chuans')->where(function ($query) use ($request) {
                    return $query->where('boTieuChuan_id', $request->input('boTieuChuan_id'));
                })],
                'boTieuChuan_id' => 'numeric|min:1'
            ], [
                'stt.required' => 'Bạn chưa nhập số thứ tự tiêu chuẩn',
                'stt.unique' =>'Số thứ tự tiêu chuẩn đã tồn tại',
                'ten.required' => 'Bạn chưa nhập tên tiêu chuẩn',
                'ten.unique' => 'Tên tiêu chuẩn đã tồn tại',
                'boTieuChuan_id.min' => 'Bạn chưa chọn bộ tiêu chuẩn',
                'boTieuChuan_id.numeric' => 'Bạn chưa chọn bộ tiêu chuẩn',
            ]);
        }

    }

    // danh sách tiêu chuẩn
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

    // form thêm tiêu chuẩn
    public function create()
    {
        $boTieuChuans = $this->boTieuChuanModel->all();
        return view('pages.tieuchuan.create', compact('boTieuChuans'));
    }

    // xữ lý thêm
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

    // form chỉnh sữa
    public function edit($id)
    {
        $tieuChuan = $this->tieuChuanModel->find($id);
        $boTieuChuans = $this->boTieuChuanModel->all();
        return view('pages.tieuchuan.edit', compact('tieuChuan', 'boTieuChuans'));
    }

    // xữ lý chiỉnh sữa
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

    // xóa vào thùng rác
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

    // danh sách trong thùng rác
    public function trash()
    {
        $tieuChuans = $this->tieuChuanModel->onlyTrashed()->paginate(10);
        return view('pages.tieuchuan.trash', compact('tieuChuans'));
    }

    // khôi phục
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

    //Khơi phục tất cả
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

    // xóa vĩnh viễn
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

    // xóa tất cả vĩnh viễn
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
