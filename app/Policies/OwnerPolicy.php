<?php

namespace App\Policies;

use App\User;
use App\Owner;
use Illuminate\Auth\Access\HandlesAuthorization;

class OwnerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the owner.
     *
     * @param  \App\User  $user
     * @param  \App\Owner  $owner
     * @return mixed
     */
    public function update(User $user, Owner $owner)
    {
        return ($owner->user_id == $user->id) /*|| ($user->id == 2)*/;
        // 2 is an admin id
    }
}
