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
        if (\Auth::check) {
            // The user is logged in.
            return true;
        } else {
            return false;
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
            'password' => 'required|confirmed|min:6',
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
            'name.required' => 'Please enter your name.',
            'name.max:255' => 'Inserted name is too long.',
            'email.required' => 'Please enter an email.',
            'email.email' => 'Not a valid email address.',
            'email.max:255' => 'Inserted email address is too long.',
            'email.unique:users' => 'Email is already in use.',
            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'Please confirm your password.',
            'password.min:6' => 'Password must be at least 6 characters.',
        ];
    }
}
