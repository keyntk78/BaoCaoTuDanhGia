<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LoaiMinhChungPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return  $user->checkPermissionAccess(config('permissions.access.loaiminhchung-danhsach'));
    }

    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.loaiminhchung-them'));
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.loaiminhchung-sua'));
    }

    public function delete(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.loaiminhchung-xoa'));
    }
}
