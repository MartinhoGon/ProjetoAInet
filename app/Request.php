<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    
    protected $fillable = [
        'quantity', 'paper_size', 'paper_type', 'file', 'colored', 'stapled', 'front_back'
    ];

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
