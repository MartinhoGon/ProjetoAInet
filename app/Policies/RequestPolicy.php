<?php

namespace App\Policies;

use App\Request;
use App\User;
use Auth;
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
        
        return Auth::user()->isAdmin() || Auth::user()->id == $request->owner_id;
    }

    public function canEvaluate (User $authUser, Request $request) //concluido e o pedido é dele próprio
    {
        return $request->status == 1 &&  $authUser->id == $request->owner_id;
    }

    public function delete (User $authUser, Request $request)
    {
        return $authUser->isAdmin() || $authUser->id == $request->owner_id;
    }

}
