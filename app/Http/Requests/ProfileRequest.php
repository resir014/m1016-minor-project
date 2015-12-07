<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (\Auth::guest) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'User name is required.',
            'name.max:255' => 'User name is too long.',
            'email.required'  => 'Email is required.',
            'email.email'  => 'Not a valid email address.',
            'email.max:255'  => 'Email is too long.',
            'email.unique:users'  => 'Email is already in use.',
            'password.required'  => 'Room type is required.',
            'password.confirmed'  => 'Password needs to be confirmed.',
            'password.min:6'  => 'Password is too short. (6 character minimum)',
        ];
    }
}
