<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StudentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Only Admins can add Student data.
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
            'id' => 'required|unique:students',
            'admission_year' => 'required|integer',
            'birth_date' => 'required|date'
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
            'id.required' => 'Please enter a Student ID.',
            'id.unique:students' => 'That Student ID already exists.',
            'admission_year.required' => 'Please enter the Admission Year.',
            'admission_year.integer' => 'Admission Year is not a valid number.',
            'birth_date.required' => 'Please enter the Birth Date.',
            'birth_date.date' => 'Birth Year is not a valid year format.'
        ];
    }
}
