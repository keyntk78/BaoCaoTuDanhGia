<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DotDanhGia;
use Illuminate\Auth\Access\HandlesAuthorization;

class DotDanhGiaPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.dotdanhgia-danhsach'));
    }

    public function view(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.dotdanhgia-chitiet'));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.dotdanhgia-them'));
    }

    public function update(User $user, $id)
    {
        $dotDanhGia = DotDanhGia::find($id);
        return $user->checkPermissionAccess(config('permissions.access.dotdanhgia-sua')) && $dotDanhGia->trangThai == 0;
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.dotdanhgia-xoa'));
    }

    public function control(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.dotdanhgia-dieukhien'));
    }
}
