<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AttendanceForm;
use App\FixedSchedule;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentVerificationController extends Controller
{
    /**
     * Verify the attendance request.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $schedule = FixedSchedule::find($id);

        $students = Student::lists('name', 'id');
    }
}
