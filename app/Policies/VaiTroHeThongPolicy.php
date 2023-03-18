<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VaiTroHeThongPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.vaitrohethong-danhsach'));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.vaitrohethong-them'));
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.vaitrohethong-sua'));
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.vaitrohethong-xoa'));
    }
}
