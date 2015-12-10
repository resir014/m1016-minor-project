<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecturer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LecturersController extends Controller
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
        $lecturers = Lecturer::all();

        return view('lecturers.index')->with('lecturers', $lecturers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecturers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        Lecturer::create($input);

        $request->session()->flash('flash_message', 'Lecturer successfully added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecturer = Lecturer::findOrFail($id);

        return view('lecturers.show')->with('lecturer', $lecturer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturer = Lecturer::findOrFail($id);

        return view('lecturers.edit')->with('lecturer', $lecturer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lecturer = Lecturer::findOrFail($id);

        $input = $request->all();

        $lecturer->fill($input)->save();

        $request->session()->flash('flash_message', 'Lecturer successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecturer = Lecturer::findOrFail($id);

        $lecturer->delete();

        \Session::flash('flash_message', 'Lecturer successfully deleted!');

        return redirect()->route('lecturers.index');
    }
}
