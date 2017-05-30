<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\Department;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    protected $fillable = ['name','email', 'password','department_id'];

    public function showUsers()
    {
        $users = User::paginate(20);
    	
    	$departments = Department::all();
    	return view('users.listUsers',compact('users', 'departments'));
    }

    public function showUserPerfil(User $user)
    {
        return view('users.viewOne_Users', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $departments = Department::all();
        return view('users.edit', compact('user', 'departments'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
       
        $users->fill($request->all());
        $users->save();

        return redirect()
            ->route('users.showUsers')
            ->with('success', 'User saved successfully');
    }

    public function orderName()
    {
        $users = User::orderBy('name', 'asc')->paginate(20);
        $departments = Department::all();
        return view('users.listUsers',compact('users', 'departments'));
    }

    public function orderDepartment()
    {
        $users = User::orderBy('department_id', 'asc')->paginate(20);
        $departments = Department::all();
        return view('users.listUsers',compact('users', 'departments'));


    }

    public function groupDepartment()
    {
        $users = User::groupBy('department_id')->paginate(20);
        $departments = Department::all();
        return view('users.listUsers',compact('users', 'departments'));
    }

    public function block(User $id)
    {
        $user = User::findOrFail($id);
        $user->blocked = true;
        $user->save();
        return redirect()->route('users.showUsers');
    }

    public function unblock(User $id)
    {
        $user = User::findOrFail($id);
        $user->blocked = false;
        $user->save();
        return redirect()->route('users.showUsers');
    }

}