<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Lecturer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function getLecturers()
    {
        $lecturers = Lecturer::all();

        return \Response::json($lecturers);
    }

    public function getCourses()
    {
        $courses = Course::all();

        return \Response::json($courses);
    }
}
