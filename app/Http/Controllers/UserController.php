<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use App\Models\DonVi;
use App\Models\DotDanhGia;
use App\Models\Nganh;
use App\Models\QuyenHT;
use App\Models\User;
use App\Models\VaiTroHT;

use App\Services\Sheet1Export;
use App\Services\SheetChucVuExport;
use App\Services\SheetUsersExport;
use App\Services\UserExport;
use App\Services\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\HandleUploadImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private $userModel;
    private $donViModel;
    private $vaiTroHTModel;
    private  $chucVuModel;
    private $nhomNguoiDungModel;
    private  $nganhModel;

    private $quyenHTModel;





    public function __construct(User $userModel,DotDanhGia $dotDanhGiaModel,QuyenHT $quyenHTModel,Nganh $nganhModel,DonVi $donViModel, VaiTroHT $vaiTroHTModel, ChucVu $chucVuModel)
    {
        $this->userModel = $userModel;
        $this->donViModel = $donViModel;
        $this->vaiTroHTModel = $vaiTroHTModel;
        $this->chucVuModel = $chucVuModel;
        $this->dotDanhGiaModel = $dotDanhGiaModel;
        $this->nganhModel = $nganhModel;
        $this->quyenHTModel = $quyenHTModel;
    }

    protected function callValidate(Request $request, $id = null)
    {
        if ($id) {
            $request->validate([
                'hoTen' => 'required',
                'email' => 'required|email|unique:users' . ',email,' . $id,
                'chucVu_id' => 'numeric|min:1',
                'donVi_id' => 'numeric|min:1',
            ], [
                'hoTen.required' => 'Bạn chưa nhập họ tên',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng định dạng email',
                'email.unique' => 'Email đã tồn tại',
                'chucVu_id.numeric' => 'Bạn chưa chọn chức vụ',
                'chucVu_id.min' => 'Bạn chưa chọn chức vụ',
                'donVi_id.numeric' => 'Bạn chưa chọn đơn vị',
                'donVi_id.min' => 'Bạn chưa chọn đơn vị',
            ]);
        } else {
            $request->validate([
                'hoTen' => 'required',
                'email' => 'required|email|unique:users',
                'chucVu_id' => 'numeric|min:1',
                'donVi_id' => 'numeric|min:1',
            ], [
                'hoTen.required' => 'Bạn chưa nhập họ tên',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chưa nhập đúng định dạng email',
                'email.unique' => 'Email đã tồn tại',
                'chucVu_id.numeric' => 'Bạn chưa chọn chức vụ',
                'chucVu_id.min' => 'Bạn chưa chọn chức vụ',
                'donVi_id.numeric' => 'Bạn chưa chọn đơn vị',
                'donVi_id.min' => 'Bạn chưa chọn đơn vị',
            ]);
        }
    }

    protected function callValidateEdit(Request $request, $id = null)
    {
        $request->validate([
            'hoTen' => 'required',
            'donVi_id' => 'numeric|min:1',
            'chucVu_id' => 'numeric|min:1',

        ], [
            'hoTen.required' => 'Bạn chưa nhập họ tên',
            'ngaySinh.required' => 'Bạn chưa nhập ngày sinh',
            'donVi_id.numeric' => 'Bạn chưa chọn đơn vị',
            'donVi_id.min' => 'Bạn chưa chọn đơn vị',
            'chucVu_id.numeric' => 'Bạn chưa chọn chức vụ',
            'chucVu_id.min' => 'Bạn chưa chọn chức vụ',
        ]);
    }

    public function index(Request $request)
    {
        $filterHoTen = $request->query('hoTen');
        $filterGioiTinh = $request->query('gioiTinh');
        $filterChucVuId = $request->query('chucVu_id');
        $filterDotDanhGia = $request->query('dotDanhGia');
        $users = $this->userModel->sortable('hoTen');
        if (!empty($filterHoTen)) {
            $users->where('users.hoTen', 'like', '%'.$filterHoTen.'%');
        }
        if ($filterGioiTinh != '') {
            $users->where('users.gioiTinh', $filterGioiTinh);
        }
        if (!empty($filterChucVuId)) {
            $users->where('users.chucVu_id', $filterChucVuId);
        }

        if (!empty($filterDotDanhGia)) {
            $tachChuoi = explode("-", $filterDotDanhGia);
            $nganhId = (int)$tachChuoi[0];
            $namHoc = (int)$tachChuoi[1];

            $users->Join('nhom_nguoi_dungs', 'nhom_nguoi_dungs.nguoiDung_id', '=', 'users.id')
                ->join('nganhs', 'nhom_nguoi_dungs.nganh_id', '=', 'nganhs.id')
                ->join('nganh_dot_danh_gias', 'nganh_dot_danh_gias.nganh_id', '=', 'nganhs.id')
                ->join('dot_danh_gias', 'nganh_dot_danh_gias.dotDanhGia_id', '=', 'dot_danh_gias.id')
                ->where('dot_danh_gias.namHoc', $namHoc)
                ->where('nhom_nguoi_dungs.nganh_id', $nganhId);

//            $users->where('users.chucVu_id', $filterChucVuId);
        }
        $users = $users->paginate(10);
        $chucVus = $this->chucVuModel->all();
        $dotDanhGias = $this->dotDanhGiaModel
                    ->join('nganh_dot_danh_gias', 'nganh_dot_danh_gias.dotDanhGia_id', '=', 'dot_danh_gias.id')
                    ->join('nganhs', 'nganh_dot_danh_gias.nganh_id', '=', 'nganhs.id')
                    ->Select('nganhs.ten as tenNganh', 'dot_danh_gias.namHoc', 'nganhs.id as nganhId', 'dot_danh_gias.id')
                    ->get();

        $trashCount = count($this->userModel->onlyTrashed()->get());
        return view('pages.user.index', compact('users', 'trashCount',
            'filterHoTen' ,'filterGioiTinh', 'filterChucVuId', 'chucVus', 'dotDanhGias', 'filterDotDanhGia'));
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
                'email' => $request->email,
                'sdt' => $request->sdt,
                'password' => Hash::make('tdg123456'),
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
        $chucVus = $this->chucVuModel->all();
        $nganhs = $this->nganhModel->all();
        return view('pages.user.edit', compact('user', 'donVis', 'vaiTroHTs', 'chucVus', 'nganhs'));
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
                'sdt' => $request->sdt,
                'donVi_id' => $request->donVi_id,
                'chucVu_id' => $request->chucVu_id,
            ]);
            $user->vaiTroHT()->sync($request->vaiTroHT);
            $datas = array();
            $slugTienDo = 'quan-ly-tien-do-bao-cao';
            $quyenHt = $this->quyenHTModel->where('slug', $slugTienDo)->first();

            if (!empty($request->nganh) && count($request->nganh) > 0) {
                foreach ( $request->nganh as $value ){
                    $nguoiDungQuyenHTs = array(
                        'nguoiDung_id'  => $id,
                        'quyenHT_id'  => $quyenHt->id,
                        'nganh_id'    => $value
                    );
                    array_push($datas, $nguoiDungQuyenHTs);
                }
            }

//            $data = array_merge($request->nganh, $datas);

            $user->nganhNguoiDungQuyenHT()->sync($datas);

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

    public function resetPassword(Request $request)
    {
        try {
            $user = $this->userModel->find($request->id);
            $user->update([
                'password' => Hash::make('tdg123456'),
            ]);
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

    public  function  addUsers()
    {
        return view('pages.user.addUsers');
    }

    public function exportSheets()
    {

        return Excel::download(new UserExport(), 'Mau-them-nguoi-dung.xlsx');
    }

    public function import()
    {

        $file = request()->file('file');
        if (is_null($file)) {
            return  redirect()->route('nguoidung.add-users')->with('message', 'Bạn chưa tải file lên!');
        }
        $fileName = $file->getClientOriginalName();
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);

        if ($extension !== 'xlsx') {
            return  redirect()->route('nguoidung.add-users')->with('message', 'Sai định dạng file!');
        }

        $data = Excel::toArray(new UsersImport(), request()->file('file'));

        $users = $this->userModel->all();
        $chucVus = $this->chucVuModel->all();
        $donVis = $this->donViModel->all();

        $errors = 0;
        $checkChuvu = 0;
        $checkDonVi = 0;

        foreach ($data[0] as $item){
            foreach ($users as $user){
                if ($user->email === $item['email']){
                    $errors++;
                    break;
                }
            }
            foreach ($chucVus as $chucVu){
                if ($chucVu->ten === $item['chuc_vu']){
                    $checkChuvu++;
                    break;
                }
            }
            if($checkChuvu == 0){
                $errors ++;
            }
            foreach ($donVis as $donVi){
                if ($donVi->ten === $item['don_vi']){
                    $checkDonVi++;
                    break;
                }
            }
            if($checkDonVi == 0){
                $errors ++;
            }

            if($item['gioi_tinh'] === 'Nam')continue;
            if($item['gioi_tinh'] === 'Nữ')continue;
            else $errors++;
        }

        if ($errors > 0) {
            return  redirect()->route('nguoidung.add-users')->with('message', 'Lỗi dữ liệu từ file!');
        }


        foreach ($data[0] as $key => $value) {
            $gioiTinh = 1;
            $fileUploaded = '/img/man-1.jpg';
            if($value['gioi_tinh'] === 'Nữ'){
                $gioiTinh = 0;
                $fileUploaded = '/img/girl-1.png';
            }
            $chucVu = $this->chucVuModel->where('chuc_vus.ten', '=', $value['chuc_vu'])->first();
            $donVi = $this->donViModel->where('don_vis.ten', '=', $value['don_vi'])->first();
            $user = $this->userModel->create([
                'hoTen' => $value['ho_ten'],
                'gioiTinh' => $gioiTinh,
                'email' => $value['email'],
                'password' => Hash::make('tdg123456'),
                'donVi_id' => $donVi->id,
                'chucVu_id' => $chucVu->id,
                'hinhAnh'  => $fileUploaded
            ]);
            $user->vaiTroHT()->attach([3]);
        }

        return redirect()->route('nguoidung.index')->with('message', 'Thêm thành công!');
    }

}
