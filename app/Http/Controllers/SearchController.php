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
    /**
     * Returns a JSON output of Typeahead query for Lecturers
     *
     * @param  string $query
     * @return \Illuminate\Http\Response
     */
    public function getLecturers($query)
    {
        $results = \DB::table('lecturers')
            ->join('users', 'lecturers.id', '=', 'users.userable_id')
            ->select('lecturers.id', 'name')
            ->where('lecturers.id', 'LIKE', '%' . $query . '%')
            ->orWhere('name', 'LIKE', '%' . $query . '%')
            ->get();

        // dd($results);

        return \Response::json($results);
    }

    /**
     * Returns a JSON output of Typeahead query for Lecturers
     *
     * @param  string $query
     * @return \Illuminate\Http\Response
     */
    public function getCourses($query)
    {
        $results = Course::select('id', 'name')
            ->where('id', 'LIKE', '%' . $query . '%')
            ->orWhere('name', 'LIKE', '%' . $query . '%')
            ->get();

        return \Response::json($results);
    }

    /**
     * Returns a JSON output of Typeahead query for Lecturers
     *
     * @param  string $query
     * @return \Illuminate\Http\Response
     */
    public function getRooms($query)
    {
        $results = Room::select('id', 'name')
            ->where('id', 'LIKE', '%' . $query . '%')
            ->orWhere('name', 'LIKE', '%' . $query . '%')
            ->get();

        return \Response::json($results);
    }

    /**
     * Returns a JSON output of Typeahead query for New Users
     *
     * @param  string $query
     * @return \Illuminate\Http\Response
     */
    public function getNewUsers($query)
    {
        $results = \DB::table('users')
            ->select('userable_id', 'name')
            ->where('userable_id', 'LIKE', '%' . $query . '%')
            ->orWhere('name', 'LIKE', '%' . $query . '%')
            ->get();

        return \Response::json($results);
    }
}
