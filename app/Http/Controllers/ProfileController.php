<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile()
    {
        $name = "Noor";

        return view('profile')->with('name', $name);
    }
}
