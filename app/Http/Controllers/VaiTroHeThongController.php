<?php

namespace App\Http\Controllers;

use App\Models\Nganh;
use App\Models\NguoiDungQuyenHTS;
use App\Models\QuyenHT;
use App\Models\User;
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
    private $userModel;
    private $nguoiDungQuyenHTModel;

    private $vaiTroHTQuyenHTModel;
    public function __construct(VaiTroHT $vaiTroHTModel,NguoiDungQuyenHTS $nguoiDungQuyenHTModel,User $userModel,QuyenHT $quyenHTModel, Nganh $nganhModel, VaiTroHTQuyenHT $vaiTroHTQuyenHTModel)
    {
        $this->vaiTroHTModel = $vaiTroHTModel;
        $this->quyenHTModel = $quyenHTModel;
        $this->nganhModel = $nganhModel;
        $this->vaiTroHTQuyenHTModel = $vaiTroHTQuyenHTModel;
        $this->userModel = $userModel;
        $this->nguoiDungQuyenHTModel = $nguoiDungQuyenHTModel;
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
            $vaiTroHT->quyenHT()->sync($request->quyenHT);
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

    public function permission()
    {
        $users = $this->userModel
            ->Join('nguoi_dung_quyen_h_t_s', 'users.id', '=','nguoi_dung_quyen_h_t_s.nguoiDung_id')
            ->Select('users.id', 'users.hoTen')
            ->groupBy('users.id', 'users.hoTen')
            ->get();
        $nganhs = $this->nganhModel
            ->Join('nguoi_dung_quyen_h_t_s', 'nganhs.id', '=','nguoi_dung_quyen_h_t_s.nganh_id')->get();
        dd($users);
        return ;
    }

    public function permissionUser()
    {
        $users = $this->userModel
                ->join('nguoi_dung_vai_tro_h_t_s', 'users.id', '=', 'nguoi_dung_vai_tro_h_t_s.nguoiDung_id')
                ->join('vai_tro_h_t_s', 'vai_tro_h_t_s.id', '=', 'nguoi_dung_vai_tro_h_t_s.vaiTroHT_id')
                ->where('vai_tro_h_t_s.id','=', 2)
                ->get();

        $nganhs = $this->nganhModel->all();

        $nguoiDungQuyenHT = $this->nguoiDungQuyenHTModel
                                    ->Join('users', 'users.id', '=','nguoi_dung_quyen_h_t_s.nguoiDung_id')
                                    ->get();

//        dd($nguoiDungQuyenHT);

        return view('pages.vaitrohethong.permissionUser', compact('users', 'nganhs', 'nguoiDungQuyenHT'));
    }

    public function createPermissionUser(Request $request){
        $slugTienDo = 'quan-ly-tien-do-bao-cao';
        $quyenHt = $this->quyenHTModel->where('slug', $slugTienDo)->first();

        foreach ($request->nganh as $item) {
            $this->nguoiDungQuyenHTModel->create([
                    'nguoiDung_id' => $request->nguoiDung_id,
                    'quyenHT_id' => $quyenHt->id,
                    'nganh_id' => $item
                ]);
        }
        return redirect()->route('vaitrohethong.create-permission-user')->with('message', 'Sửa thành công!');
    }

}
