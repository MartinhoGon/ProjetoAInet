<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function showUsers()
    {
    	$users = User::all();
    	return view('users.listAll_Users',compact('users'));
    }
}