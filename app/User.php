<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'department_id'
    ];
	//estabelcer as relações com a BD
    public function request() 
    {
    	return $this->hasMany('App\Request','owner_id','id');
    }

    public function comment() 
    {
    	return $this->hasMany('App\Comment','user_id','id');
    }

    public function department() 
    {
    	return $this->hasOne('App\Request','department_id','id');
    }


}
