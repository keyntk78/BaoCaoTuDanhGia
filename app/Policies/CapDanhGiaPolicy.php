<?php

namespace App\Policies;

use App\Models\CapDanhGia;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CapDanhGiaPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.capdanhgia-danhsach'));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.capdanhgia-them'));
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.capdanhgia-sua'));
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.capdanhgia-xoa'));
    }
}
