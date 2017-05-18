<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	//Establecer relações com a BD
    public function user () 
    {
    	return $this->hasMany('App\User');
    }

}
