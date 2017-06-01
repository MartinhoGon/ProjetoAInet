<?php

namespace App\Policies;

use App\Request;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestPolicy
{

	use HandlesAuthorization;
   

    public function create(User $authUser)
    {
        return true;
    }

    public function update(User $authUser, Request $request)
    {
        
        return $authUser->isAdmin() || $authUser->id == $request->owner_id;
    }

    

}
