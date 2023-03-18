<?php

namespace App\Policies;

use App\Models\MoTieuChuan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BoTieuChuanPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.botieuchuan-danhsach'));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.botieuchuan-them'));
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.botieuchuan-sua'));
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.botieuchuan-xoa'));
    }
}
