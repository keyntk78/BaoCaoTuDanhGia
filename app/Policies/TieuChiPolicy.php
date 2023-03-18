<?php

namespace App\Policies;

use App\Models\TieuChi;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TieuChiPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.tieuchi-danhsach'));
    }

    public function view(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.tieuchi-chitiet'));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.tieuchi-them'));
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.tieuchi-sua'));
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.tieuchi-xoa'));
    }
}
