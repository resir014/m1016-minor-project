<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfilesController extends Controller
{
    /**
     * Creates a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        return view('profile.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $user = \Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        $request->session()->flash('flash_message', 'Profile successfully updated!');

        return redirect()->back();
    }
}
