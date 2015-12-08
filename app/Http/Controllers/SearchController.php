<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Room;
use App\Lecturer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function getLecturers()
    {
        $results = Lecturer::with('user')->get();

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

    public function getRooms($query)
    {
        $results = Room::select('id', 'name')
            ->where('id', 'LIKE', '%' . $query . '%')
            ->orWhere('name', 'LIKE', '%' . $query . '%')
            ->get();

        return \Response::json($results);
    }
}
