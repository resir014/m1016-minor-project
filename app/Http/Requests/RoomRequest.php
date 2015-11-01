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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'room_number' => 'required',
            'room_name' => 'required',
            'room_type' => 'required',
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
            'room_number.required' => 'Room number is required.',
            'room_name.required'  => 'Room name is required.',
            'room_type.required'  => 'Room type is required.',
            'location.required'  => 'Location is required.',
        ];
    }
}