<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'department_id' => 'required|integer|exists:department_id',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(Request $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'department_id' => $data['department_id'],
            'admin' => '0',
            'blocked' => '0',

        ]);

        return redirect()
            ->route('register');
    }

    protected function register(Request $request)
    {
        $input = $request->all();
        $validator = $this->validator($input);

        if ($validator->passes()) {
            $data = $this->create($input)->toArray();

            $data['remember_token'] = str_random(25);

            $user = User::find($data['id']);
            $user->remember_token = $data['remember_token'];
            $user->save();

            Mail::send('mails.confirmation', $data, function ($message) use ($data) {
                $message->to($data['email']);
                $message->subject('Registration Confirmation');
            });
            return redirect(route('login'))->with('activated', 'Confirmation email has been send. Please check your email.');
        }
        return redirect(route('login'))->with('errors', $validator->errors);
    }

    public function confirmation($remember_token)
    {
        $user = User::where('remember_token', $remember_token)->first();

        if (!is_null($user)) {
            $user->activated = 1;
            $user->remember_token = '';
            $user->save();
            return redirect(route('login'))->with('activated', 'Your activation is completed.');
        }
        return redirect(route('login'))->with('activated', 'Something went wrong.');
    }
}
