<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScheduleDraft;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Create a new search controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('schedule-drafts.index');
    }

    public function query(Request $request)
    {
        $query = $request->id;
        $res = ScheduleDraft::where('id', 'LIKE', "%$query%")->get();

        return response()->json($res);
    }
}
