<?php

namespace App\Policy;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{

	use HandlesAuthorization;
    /**
     * Determine whether the user can create users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $authUser)
    {
        return false;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $authUser, User $user)
    {
        return $authUser->id == $user->id;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $authUser, User $user)
    {
        return false;
    }
}
