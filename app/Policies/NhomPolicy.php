<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NhomPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.nhom-danhsach'));
    }

    public function view(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.nhom-chitiet'));
    }

    public function detail(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.nhom-thanhvien'));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.nhom-them'));
    }


    public function update(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.nhom-sua'));
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.nhom-xoa'));
    }
}
