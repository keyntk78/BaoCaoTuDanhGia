<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use App\Models\DonVi;
use App\Models\User;
use App\Models\VaiTroHT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\HandleUploadImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $userModel;
    private $donViModel;
    private $vaiTroHTModel;
    private  $chucVuModel;
    public function __construct(User $userModel, DonVi $donViModel, VaiTroHT $vaiTroHTModel, ChucVu $chucVuModel)
    {
        $this->userModel = $userModel;
        $this->donViModel = $donViModel;
        $this->vaiTroHTModel = $vaiTroHTModel;
        $this->chucVuModel = $chucVuModel;
    }

    protected function callValidate(Request $request, $id = null)
    {
        if ($id) {
            $request->validate([
                'hoTen' => 'required',
                'chucVu' => 'required',
                'email' => 'required|email|unique:users' . ',email,' . $id,
                'donVi_id' => 'numeric|min:1',
            ], [
                'hoTen.required' => 'Bạn chưa nhập họ tên',
                'chucVu.required' => 'Bạn chưa nhập chức vụ',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng định dạng email',
                'email.unique' => 'Email đã tồn tại',
                'donVi_id.numeric' => 'Bạn chưa chọn đơn vị',
                'donVi_id.min' => 'Bạn chưa chọn đơn vị',
            ]);
        } else {
            $request->validate([
                'hoTen' => 'required',
                'chucVu' => 'required',
                'email' => 'required|email|unique:users',
                'donVi_id' => 'numeric|min:1',
            ], [
                'hoTen.required' => 'Bạn chưa nhập họ tên',
                'chucVu.required' => 'Bạn chưa nhập chức vụ',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng định dạng email',
                'email.unique' => 'Email đã tồn tại',
                'donVi_id.numeric' => 'Bạn chưa chọn đơn vị',
                'donVi_id.min' => 'Bạn chưa chọn đơn vị',
            ]);
        }
    }

    protected function callValidateEdit(Request $request, $id = null)
    {
        $request->validate([
            'hoTen' => 'required',
            'ngaySinh' => 'required',
            'chucVu' => 'required',
            'sdt' => 'required|min:10|numeric|unique:users' . ',sdt,' . $id,
            'donVi_id' => 'numeric|min:1',
        ], [
            'hoTen.required' => 'Bạn chưa nhập họ tên',
            'ngaySinh.required' => 'Bạn chưa nhập ngày sinh',
            'chucVu.required' => 'Bạn chưa nhập chức vụ',
            'sdt.required' => 'Bạn chưa nhập số điện thoại',
            'sdt.min' => 'Bạn chưa nhập đúng định dạng số điện thoại',
            'sdt.numeric' => 'Bạn chưa nhập đúng định dạng số điện thoại',
            'sdt.unique' => 'Số điện thoại đã tồn tại',
            'donVi_id.numeric' => 'Bạn chưa chọn đơn vị',
            'donVi_id.min' => 'Bạn chưa chọn đơn vị',
        ]);
    }

    public function index(Request $request)
    {
        $filterHoTen = $request->query('hoTen');
        $filterGioiTinh = $request->query('gioiTinh');
        $filterChucVu = $request->query('chucVu');
        $users = $this->userModel->sortable('hoTen');
        if (!empty($filterHoTen)) {
            $users->where('users.hoTen', 'like', '%'.$filterHoTen.'%');
        }
        if ($filterGioiTinh != '') {
            $users->where('users.gioiTinh', $filterGioiTinh);
        }
        if (!empty($filterChucVu)) {
            $users->where('users.chucVu', 'like', '%'.$filterChucVu.'%');
        }
        $users = $users->paginate(10);
        $trashCount = count($this->userModel->onlyTrashed()->get());
        return view('pages.user.index', compact('users', 'trashCount', 'filterHoTen' ,'filterGioiTinh', 'filterChucVu'));
    }

    public function create()
    {
        $donVis = $this->donViModel->all();
        $vaiTroHTs = $this->vaiTroHTModel->all();
        $chucVus = $this->chucVuModel->all();
        return view('pages.user.create', compact('donVis', 'vaiTroHTs', 'chucVus'));
    }

    public function store(Request $request)
    {
        $this->callValidate($request);
        try {
            DB::beginTransaction();
            $fileUploaded = HandleUploadImage::upload($request, 'hinhAnh', 'photos');
            if (empty($fileUploaded)) {
                if ($request->gioiTinh == 1) {
                    $fileUploaded = '/img/man-1.jpg';
                } else {
                    $fileUploaded = '/img/girl-1.png';
                }
            }
            $user = $this->userModel->create([
                'hoTen' => $request->hoTen,
                'gioiTinh' => $request->gioiTinh,
                'ngaySinh' => $request->ngaySinh,
                'chucVu' => $request->chucVu,
                'email' => $request->email,
                'sdt' => $request->sdt,
                'password' => Hash::make('123456'),
                'donVi_id' => $request->donVi_id,
                'chucVu_id' => $request->chucVu_id,
                'hinhAnh'  => $fileUploaded
            ]);
            $user->vaiTroHT()->attach($request->vaiTroHT);
            DB::commit();
            return redirect()->route('nguoidung.index')->with('message', 'Thêm thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
        }
    }

    public function show($id)
    {
        $user = $this->userModel->find($id);
        return view('pages.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);
        $donVis = $this->donViModel->all();
        $vaiTroHTs = $this->vaiTroHTModel->all();
        return view('pages.user.edit', compact('user', 'donVis', 'vaiTroHTs'));
    }

    public function update(Request $request, $id)
    {
        $this->callValidateEdit($request, $id);
        try {
            DB::beginTransaction();
            $user = $this->userModel->find($id);
            $user->update([
                'hoTen' => $request->hoTen,
                'gioiTinh' => $request->gioiTinh,
                'ngaySinh' => $request->ngaySinh,
                'chucVu' => $request->chucVu,
                'sdt' => $request->sdt,
                'donVi_id' => $request->donVi_id,
            ]);
            $user->vaiTroHT()->sync($request->vaiTroHT);
            DB::commit();
            return redirect()->route('nguoidung.show', ['id' => $id])->with('message', 'Sửa thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $this->userModel->find($request->id)->delete();
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
        $users = $this->userModel->onlyTrashed()->paginate(10);
        return view('pages.user.trash', compact('users'));
    }

    public function restore(Request $request)
    {
        try {
            $this->userModel->onlyTrashed()->find($request->id)->restore();
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
            $this->userModel->onlyTrashed()->restore();
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
            $this->userModel->onlyTrashed()->find($request->id)->forceDelete();
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
            $this->userModel->onlyTrashed()->forceDelete();
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
