<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'department_id', 'activated'
    ];
    
    //estabelcer as relações com a BD
    public function requests()
    {
        return $this->hasMany('App\Requests', 'owner_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment', 'user_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id', 'id');
    }

    public function isAdmin()
    {
        return (int) $this->admin === 1;
    }

    public function isFunc()
    {
        return (int) $this->admin === 0;
    }

    public function blocked()
    {
        return (int) $this->blocked === 0;
    }

    public function unblocked()
    {
        return (int) $this->blocked === 1;
    }
}
