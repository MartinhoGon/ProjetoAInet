<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
	//Establecer relações com a BD
    public function request() 
    {
    	return $this->hasMany('App\Request',);
    }

}
