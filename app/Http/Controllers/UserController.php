<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;

class UserController extends Controller
{
    public function showUsers()
    {
    	$users = User::all();
    	$departments = Department::all();
    	return view('users.listAll_Users',compact('users', 'departments'));
    }
}