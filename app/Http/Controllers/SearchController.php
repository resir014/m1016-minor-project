<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{

    public function autocomplete(Request $request)
    {
        $term = $request->input('term');

        $results = array();

        $queries = DB::table('users')
            ->where('name', 'LIKE', '%'.$term.'%')
            ->orWhere('userable_type', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [
                'id' => $query->id,
                'value' => $query->name,
                'userable_type' => $query->userable_type
            ];
        }

        return Response::json($results);
    }

    public function searchUsers()
    {
        return view('search');
    }
}
