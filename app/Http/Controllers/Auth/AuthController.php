<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'userable_id' => 'required|unique:users',
            'userable_type' => 'required',
            'password' => 'required|confirmed|min:6',
        ];

        $messages = [
            'name.required' => 'Please enter your name.',
            'name.max:255' => 'Inserted name is too long.',
            'email.required' => 'Please enter an email.',
            'email.email' => 'Not a valid email address.',
            'email.max:255' => 'Inserted email address is too long.',
            'email.unique:users' => 'Email is already in use.',
            'userable_id.required' => 'Please enter your ID.',
            'userable_id.unique' => 'That ID is already in use.',
            'userable_type.required' => 'Please choose your role.',
            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'Please confirm your password.',
            'password.min:6' => 'Password must be at least 6 characters.',
        ];

        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'userable_id' => $data['userable_id'],
            'userable_type' => $data['userable_type'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
