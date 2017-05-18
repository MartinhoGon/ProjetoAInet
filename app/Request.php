<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
	//Establecer relações com a BD
    public function user() 
    {
    	return $this->belongsTo('App\User','owner_id', 'id');
    }

    public function comment() 
    {
    	return $this->hasMany('App\Comment');
    }

    public function printer() 
    {
    	return $this->hasOne('App\Printer');
    }


    //---------------------------------------

    
    
}
