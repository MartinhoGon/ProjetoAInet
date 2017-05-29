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
    public function requests() 
    {
    	return $this->hasMany('App\Requests','owner_id','id');
    }

    public function comment() 
    {
    	return $this->hasMany('App\Comment','user_id','id');
    }

    public function department() 
    {
    	return $this->belongsTo( 'App\Department' , 'department_id', 'id');
    }

}
