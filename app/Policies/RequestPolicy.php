<?php

namespace App\Policies;

use App\Request as Pedido;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestPolicy
{

	use HandlesAuthorization;
   

    public function create(User $authUser)
    {
        return true;
    }

    public function update(Request $authUser, User $user)
    {
        
        return $authUser->isAdmin() || $authUser->id == $user->id;
    }

    public function delete(Request $authUser)
    {
        return $authUser->isAdmin();
    }    
}
