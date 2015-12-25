<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecturer;
use App\ScheduleDraft;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CreditOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::all();

        return view('credit-overview.index', compact('lecturers'));
    }
}
