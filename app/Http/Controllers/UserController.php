<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;

class UserController extends Controller
{
    protected $fillable = ['name','email', 'password','department_id'];

    public function showUsers()
    {
    	$users = User::all();
    	$departments = Department::all();
    	return view('listAll_Users',compact('users', 'departments'));
    }

    public function edit(Request $users)
    {
        $this->authorize('update', $users);
        return view('users.edit', compact('users'));
    }

    public function update(UpdateUserRequest $request, User $users)
    {
        $this->authorize('update', $users);
        $except = ['password'];
        // if (!$user->isAdmin()) {
        //     $except[] = 'type';
        // }
        $users->fill($request->except($except));
        $users->save();

        return redirect()
            ->route('users.showUsers')
            ->with('success', 'User saved successfully');
    }


    //public function create()
    //{
    //     $this->authorize('create', Request::class);
    //     $users = new User();
    //     return view('users.add', compact('users'));
    // }


    // public function store(StoreUserRequest $users)
    // {
    //     $this->authorize('create', User::class);
    //     $users = new User;
    //     $users->fill($request->all());
    //     $users->password = Hash::make($request->password);

    //     $users->save();

    //     return redirect()
    //         ->route('users.showUsers')
    //         ->with('success', 'User added successfully');
    // }
}