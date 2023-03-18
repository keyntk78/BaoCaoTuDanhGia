<?php

namespace App\Http\Controllers;

use App\Models\Nganh;
use App\Models\QuyenHT;
use App\Models\VaiTroHT;
use App\Models\VaiTroHTQuyenHT;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VaiTroHeThongController extends Controller
{
    private $vaiTroHTModel;
    private $quyenHTModel;
    private $nganhModel;
    private $vaiTroHTQuyenHTModel;
    public function __construct(VaiTroHT $vaiTroHTModel, QuyenHT $quyenHTModel, Nganh $nganhModel, VaiTroHTQuyenHT $vaiTroHTQuyenHTModel)
    {
        $this->vaiTroHTModel = $vaiTroHTModel;
        $this->quyenHTModel = $quyenHTModel;
        $this->nganhModel = $nganhModel;
        $this->vaiTroHTQuyenHTModel = $vaiTroHTQuyenHTModel;
    }

    protected function callValidate(Request $request, $id = null)
    {
        if ($id) {
            $request->validate([
                'ten' => 'required|unique:vai_tro_h_t_s' . ',ten,' . $id,
            ], [
                'ten.required' => 'Bạn chưa nhập tên vai trò',
                'ten.unique' => 'Tên vai trò đã tồn tại',
            ]);
        } else {
            $request->validate([
                'ten' => 'required|unique:vai_tro_h_t_s',
            ], [
                'ten.required' => 'Bạn chưa nhập tên vai trò',
                'ten.unique' => 'Tên vai trò đã tồn tại',
            ]);
        }
    }

    public function index()
    {
        $vaiTroHTs = $this->vaiTroHTModel->all();
        $trashCount = count($this->vaiTroHTModel->onlyTrashed()->get());
        return view('pages.vaitrohethong.index', compact('vaiTroHTs', 'trashCount'));
    }

    public function create()
    {
        $parentQuyenHTs = $this->quyenHTModel->where('parent_id', 0)->get();
        $nganhs = $this->nganhModel->all();
        return view('pages.vaitrohethong.create', compact('parentQuyenHTs', 'nganhs'));
    }

    public function store(Request $request)
    {
        $this->callValidate($request);
        try {
            DB::beginTransaction();
            $vaiTroHT = $this->vaiTroHTModel->create([
                'ten' => $request->ten,
                'slug' => Str::slug($request->ten, '-')
            ]);
            $vaiTroHT->quyenHT()->attach($request->quyenHT);
            if (!empty($request->nganh_id) && count($request->nganh_id) > 0 && !empty($request->quanLyTienDo)) {
                $datas = array();
                foreach ( $request->nganh_id as $value ){
                    $quyenHTs = array(
                        'vaiTroHT_id'  => $vaiTroHT->id,
                        'quyenHT_id'  => $request->quanLyTienDo,
                        'nganh_id'    => $value
                    );
                    array_push($datas, $quyenHTs);
                }
                $vaiTroHT->quyenHT()->attach($datas);
            }
            DB::commit();
            return redirect()->route('vaitrohethong.index')->with('message', 'Thêm thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
        }
    }

    public function edit($id)
    {
        $vaiTroHT = $this->vaiTroHTModel->find($id);
        $currentQuyens = [];
        foreach ($vaiTroHT->quyenHT as $item) {
            array_push($currentQuyens, $item->id);
        }
        $nganhIds = [];
        $quyenQLtienDos = $this->vaiTroHTQuyenHTModel->where('vaiTroHT_id', $vaiTroHT->id)->where('quyenHT_id', 63)->get();  // 63 là ID của quyền Quản lý tiến độ báo cáo
        foreach ($quyenQLtienDos as $quyenQLTienDo) {
            array_push($nganhIds, $quyenQLTienDo->nganh_id);
        }
        $parentQuyenHTs = $this->quyenHTModel->where('parent_id', 0)->get();
        $nganhs = $this->nganhModel->all();
        return view('pages.vaitrohethong.edit', compact('vaiTroHT', 'parentQuyenHTs', 'currentQuyens', 'nganhs', 'nganhIds'));
    }

    public function update(Request $request, $id)
    {

        $this->callValidate($request, $id);
        try {
            DB::beginTransaction();
            $vaiTroHT = $this->vaiTroHTModel->find($id);
            $vaiTroHT->update([
                'ten' => $request->ten,
                'slug' => Str::slug($request->ten, '-')
            ]);
            $request->quyenHT = !empty($request->quyenHT) ? $request->quyenHT : array();
            $datas = array();
            if (!empty($request->nganh_id) && count($request->nganh_id) > 0 && !empty($request->quanLyTienDo)) {
                foreach ( $request->nganh_id as $value ){
                    $quyenHTs = array(
                        'vaiTroHT_id'  => $vaiTroHT->id,
                        'quyenHT_id'  => $request->quanLyTienDo,
                        'nganh_id'    => $value
                    );
                    array_push($datas, $quyenHTs);
                }
            }
            $vaiTroHT->quyenHT()->sync(array_merge($request->quyenHT, $datas));
            DB::commit();
            return redirect()->route('vaitrohethong.index')->with('message', 'Sửa thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $this->vaiTroHTModel->find($request->id)->delete();
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
        $vaiTroHTs = $this->vaiTroHTModel->onlyTrashed()->paginate(10);
        return view('pages.vaitrohethong.trash', compact('vaiTroHTs'));
    }

    public function restore(Request $request)
    {
        try {
            $this->vaiTroHTModel->onlyTrashed()->find($request->id)->restore();
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
            $this->vaiTroHTModel->onlyTrashed()->restore();
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
            $vaiTroHT = $this->vaiTroHTModel->onlyTrashed()->find($request->id);
            $vaiTroHT->quyenHT()->detach();
            $vaiTroHT->forceDelete();
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
            $vaiTroHTs = $this->vaiTroHTModel->onlyTrashed()->forceDelete();
            foreach ($vaiTroHTs as $vaiTroHT) {
                $vaiTroHT->quyenHT()->detach();
                $vaiTroHT->forceDelete();
            }
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
