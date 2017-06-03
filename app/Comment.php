<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Establecer relações com a BD
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function request()
    {
        return $this->belongsTo('App\Request', 'request_id', 'id');
    }

    public function comment()
    {
        return $this->belongsTo('App\Comment', 'parent_id');
    }
}
