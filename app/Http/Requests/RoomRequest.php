<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RoomRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Only Admins can add Room data.
        if (\Auth::user()->userable_type == 'Admin') {
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
            'id' => 'required',
            'name' => 'required',
            'type' => 'required',
            'location' => 'required'
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
            'id.required' => 'Room number is required.',
            'name.required'  => 'Room name is required.',
            'type.required'  => 'Room type is required.',
            'location.required'  => 'Location is required.',
        ];
    }
}
