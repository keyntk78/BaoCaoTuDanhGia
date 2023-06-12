<?php

namespace App\Policies;

use App\Models\ChucVu;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChucVuPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.chucvu-danhsach'));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.chucvu-them'));
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.chucvu-sua'));
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.chucvu-xoa'));
    }
}
