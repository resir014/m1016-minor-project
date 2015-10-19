<?php

namespace App\Http\Controllers;

/**
 * WelcomeController
 */
class WelcomeController extends Controller
{

    /**
     * Creates a new controller instance.
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Shows the application's welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('welcome');
        // ini berarti dia nge-load template di folder resources/views template 'welcome'
    }
}
