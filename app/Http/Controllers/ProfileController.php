<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $data = array(
            'user'  =>    Auth::user(),
            'type'  =>    get_class(Auth::user()->userable)
        );

        return View::make('profile.blade.php', $data);
    }
}
