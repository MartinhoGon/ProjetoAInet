<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
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

    public function showUser(User $user)
    {
        return view('users.viewOne_Users', compact('user'));
    }

    public function edit(Request $user)
    {
        //$this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        //$this->authorize('update', $users);
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