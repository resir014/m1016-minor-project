<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Requests\ProfileRequest;
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

        if (\Hash::check($request->old_password, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
        } else {
            return redirect()->back()->withErrors(['Your current password is incorrect. Please reenter the correct password.']);
        }

        $request->session()->flash('flash_message', 'Profile successfully updated!');

        return redirect()->back();
    }
}
