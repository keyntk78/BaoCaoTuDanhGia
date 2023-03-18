<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NguoiDungPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.nguoidung-danhsach'));
    }

    public function view(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.nguoidung-chitiet'));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.nguoidung-them'));
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.nguoidung-sua'));
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.nguoidung-xoa'));
    }
}
