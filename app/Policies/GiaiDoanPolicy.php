<?php

namespace App\Policies;

use App\Models\BaoCao;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GiaiDoanPolicy
{
    use HandlesAuthorization;

    public function update(User $user, $id)
    {
        $baoCao = BaoCao::find($id);
        return $user->checkTime('viet-bao-cao', $baoCao);
    }

    public function comment(User $user, $id)
    {
        $baoCao = BaoCao::find($id);
        return $user->checkTime('nhan-xet-bao-cao', $baoCao);
    }

    public function counterArg(User $user, $id)
    {
        $baoCao = BaoCao::find($id);
        return $user->checkTime('phan-bien-bao-cao', $baoCao);
    }
}
