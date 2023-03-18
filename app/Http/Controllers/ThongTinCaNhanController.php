<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\HandleUploadImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ThongTinCaNhanController extends Controller
{
    private $userModel;
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    protected function callValidate(Request $request, $id = null)
    {
        $request->validate([
            'hoTen' => 'required',
            'ngaySinh' => 'required',
            'sdt' => 'required|min:10|numeric|unique:users' . ',sdt,' . $id,
        ], [
            'hoTen.required' => 'Bạn chưa nhập họ tên',
            'ngaySinh.required' => 'Bạn chưa nhập ngày sinh',
            'sdt.required' => 'Bạn chưa nhập số điện thoại',
            'sdt.min' => 'Bạn chưa nhập đúng định dạng số điện thoại',
            'sdt.numeric' => 'Bạn chưa nhập đúng định dạng số điện thoại',
            'sdt.unique' => 'Số điện thoại đã tồn tại',
        ]);
    }

    protected function callValidateUpdatePassword(Request $request, $id = null)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'new_password_confirmation' => 'required|same:new_password',
        ], [
            'old_password.required' => 'Bạn chưa nhập mật khẩu cũ',
            'new_password.required' => 'Bạn chưa nhập mật khẩu mới',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 6 kí tự',
            'new_password_confirmation.required' => 'Bạn chưa nhập lại mật khẩu mới',
            'new_password_confirmation.same' => 'Mật khẩu nhập lại không khớp',
        ]);
    }

    public function show()
    {
        return view('pages.thongtincanhan.show');
    }

    public function edit()
    {
        return view('pages.thongtincanhan.edit');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $this->callValidate($request, $user->id);
        $fileUploaded = HandleUploadImage::upload($request, 'hinhAnh', 'photos');
        $args = [
            'hoTen' => $request->hoTen,
            'gioiTinh' => $request->gioiTinh,
            'ngaySinh' => $request->ngaySinh,
            'sdt' => $request->sdt,
        ];
        if (!empty($fileUploaded)) {
            $args['hinhAnh'] = $fileUploaded;
        }
        $this->userModel->find($user->id)->update($args);
        return redirect()->route('thongtincanhan.show')->with('message', 'Sửa thành công!');
    }

    public function changePassword() {
        return view('pages.thongtincanhan.changepassword');
    }

    public function savePassword(Request $request) {
        $user = auth()->user();
        $this->callValidateUpdatePassword($request, $user->id);
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $new_password_confirmation = $request->new_password_confirmation;
        if (!(Hash::check($request->old_password, $user->password))) {
            $message = 'Mật khẩu hiện tại không đúng!';
            return redirect()->back()->with(compact('message', 'old_password', 'new_password', 'new_password_confirmation'));
        }
        if(strcmp($request->old_password, $request->new_password) == 0){
            $message = 'Mật khẩu mới không được giống mật khẩu hiện tại!';
            return redirect()->back()->with(compact('message', 'old_password', 'new_password', 'new_password_confirmation'));
        }
        $this->userModel->find($user->id)->update([
            'password' => bcrypt($request->new_password)
        ]);
        return redirect()->route('thongtincanhan.show')->with('message', 'Cập nhật mật khẩu thành công!');
    }
}
