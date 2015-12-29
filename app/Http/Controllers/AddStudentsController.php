<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FixedSchedule;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddStudentsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $fixedSchedule = FixedSchedule::findOrFail($id);

        return view('add-students.create')->with('fixedSchedule', $fixedSchedule);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fixedSchedule = FixedSchedule::findOrFail($id);

        $input = $request->all();

        dd($input);

        $fixedSchedule->students()->sync($request->student_id);

        $request->session()->flash('flash_message', 'Student successfully added!');

        return redirect()->back();
    }
}
