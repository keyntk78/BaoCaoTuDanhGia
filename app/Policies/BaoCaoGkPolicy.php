<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BaoCaoGkPolicy
{

    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.baocaogiuaky-danhsach'));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.baocaogiuaky-them'));
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.baocaogiuaky-sua'));
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.baocaogiuaky-xoa'));
    }

    public function handleStatus(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.baocaogiuaky-trangthai'));
    }
}
