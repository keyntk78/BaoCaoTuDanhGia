<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BaoCao;
use App\Models\NhomNguoiDung;
use App\Models\DotDanhGia;
use App\Services\PhanBienBaoCaoPermission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhanBienBaoCaoPolicy
{
    use HandlesAuthorization;

    public function view()
    {
        $baoCaoPer = new PhanBienBaoCaoPermission();
        return $baoCaoPer->view();
    }

    public function comment(User $user, $id)
    {
        $baoCao = BaoCao::find($id);
        $nhomNguoiDungs = NhomNguoiDung::where('nguoiDung_id', $user->id)->get();
        $baoCaoPer = new PhanBienBaoCaoPermission();
        $dotDanhGia = DotDanhGia::find($baoCao->dotDanhGia_id);
        $isInprocess = $dotDanhGia->trangThai == 0 ? true : false;
        return $isInprocess && $baoCaoPer->comment($nhomNguoiDungs, $baoCao) && $user->checkTime('phan-bien-bao-cao', $baoCao);
    }
}
