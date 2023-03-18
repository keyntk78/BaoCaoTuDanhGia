<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Nhom;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuanLyNhomPolicy
{
    use HandlesAuthorization;

    public function control(User $user)
    {
        $nhoms = Nhom::join('nhom_nguoi_dungs', 'nhom_nguoi_dungs.nhom_id', '=', 'nhoms.id')
            ->where('nhom_nguoi_dungs.nguoiDung_id', $user->id)
            ->where('nhom_nguoi_dungs.vaiTro_id', 2)->get();
        if (count($nhoms) > 0) {
            return true;
        }
        return false;
    }
}
