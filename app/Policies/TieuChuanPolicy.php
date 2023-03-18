<?php

namespace App\Policies;

use App\Models\TieuChuan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TieuChuanPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.tieuchuan-danhsach'));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.tieuchuan-them'));
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.tieuchuan-sua'));
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.tieuchuan-xoa'));
    }
}
