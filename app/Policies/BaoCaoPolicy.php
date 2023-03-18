<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BaoCao;
use App\Models\NhomNguoiDung;
use App\Models\DotDanhGia;
use App\Services\BaoCaoPermission;
use Illuminate\Auth\Access\HandlesAuthorization;

class BaoCaoPolicy
{
    use HandlesAuthorization;

    public function view()
    {
        $baoCaoPer = new BaoCaoPermission();
        return $baoCaoPer->editSomething() || $baoCaoPer->create();
    }

    public function editSomething()
    {
        $baoCaoPer = new BaoCaoPermission();
        return $baoCaoPer->editSomething();
    }

    public function create()
    {
        $baoCaoPer = new BaoCaoPermission();
        return $baoCaoPer->create();
    }

    public function trash()
    {
        $baoCaoPer = new BaoCaoPermission();
        return $baoCaoPer->trash();
    }

    public function editPersonal(User $user, $id)
    {
        $baoCao = BaoCao::find($id);
        $nhomNguoiDungs = NhomNguoiDung::where('nguoiDung_id', $user->id)->get();
        $dotDanhGia = DotDanhGia::find($baoCao->dotDanhGia_id);
        $isInprocess = $dotDanhGia->trangThai == 0 ? true : false;
        $baoCaoPer = new BaoCaoPermission();
        return $isInprocess && $baoCaoPer->updatePersonal($nhomNguoiDungs, $baoCao) && $user->checkTime('viet-bao-cao', $baoCao);
    }

    public function deletePersonal(User $user, $id)
    {
        $baoCao = BaoCao::withTrashed()->find($id);
        $baoCaoPer = new BaoCaoPermission();
        return $baoCaoPer->deletePersonal($user, $baoCao);
    }

    public function controlPersonal(User $user, $id)
    {
        $baoCao = BaoCao::find($id);
        $nhomNguoiDungs = NhomNguoiDung::where('nguoiDung_id', $user->id)->get();
        $baoCaoPer = new BaoCaoPermission();
        return $baoCaoPer->controlPersonal($nhomNguoiDungs, $baoCao);
    }
}
