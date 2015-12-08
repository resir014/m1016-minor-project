<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Lecturer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function getLecturers($query)
    {
        // $results = Lecturer::select('id')->where('id', 'LIKE', '%' . $query . '%')->get();
        $results = Lecturer::with('user')->where('id', 'LIKE', '%' . 'd' . '%');

        return \Response::json($results);
    }

    public function getCourses($query)
    {
        $results = Course::select('id', 'name')
            ->where('id', 'LIKE', '%' . $query . '%')
            ->orWhere('name', 'LIKE', '%' . $query . '%')
            ->get();

        return \Response::json($results);
    }
}
