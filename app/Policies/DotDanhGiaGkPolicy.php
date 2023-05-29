<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DotDanhGiaGkPolicy
{
    use HandlesAuthorization;

    public function createAndShow(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.dotdanhgiagiuaky-xemthem'));
    }

    public function update(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.dotdanhgiagiuaky-sua'));
    }
}
