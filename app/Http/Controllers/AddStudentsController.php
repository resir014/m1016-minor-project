<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FixedSchedule;
use App\Student;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fixedSchedule = FixedSchedule::find($id);
        $students = Student::lists('name', 'id');

        return view('add-students.edit', compact('fixedSchedule', 'students'));
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
        $fixedSchedule = FixedSchedule::find($id);
        $students = Student::lists('name', 'id');

        $input = $request->all();

        if (!$fixedSchedule->students->contains($request->student_id)) {
            $fixedSchedule->students()->attach($request->student_id);
        } else {
            return redirect()->back()->withErrors(['Student already exists!']);
        }

        $request->session()->flash('flash_message', 'Student successfully added!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $schedule_id
     * @param  string  $student_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $schedule_id, $student_id)
    {
        $fixedSchedule = FixedSchedule::find($schedule_id);

        $fixedSchedule->students()->detach($student_id);

        $request->session()->flash('flash_message', 'Student successfully removed!');

        return redirect()->back();
    }
}
