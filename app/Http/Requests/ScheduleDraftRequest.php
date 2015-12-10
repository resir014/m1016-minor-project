<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ScheduleDraftRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Only Admins and Lecturers can add ScheduleDraft data.
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
            //
        ];
    }
}
