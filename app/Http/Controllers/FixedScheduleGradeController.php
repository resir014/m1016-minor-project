<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FixedSchedule;
use App\Grade;
use App\Student;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FixedScheduleGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $schedule_id
     * @return \Illuminate\Http\Response
     */
    public function index($schedule_id)
    {
        $schedule = FixedSchedule::findOrFail($schedule_id);
        $grades = Grade::all();

        return view('fixed-schedules.grades.index', compact('schedule', 'grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $schedule_id
     * @return \Illuminate\Http\Response
     */
    public function create($schedule_id, $student_id)
    {
        $schedule = FixedSchedule::findOrFail($schedule_id);
        $student = Student::findOrFail($student_id);

        return view('fixed-schedules.grades.create', compact('schedule', 'student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $schedule_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $schedule_id)
    {
        $schedule = FixedSchedule::findOrFail($schedule_id);
        $students = $schedule->students->lists('id');

        $input = $request->all();

        Grade::create($input);

        $request->session()->flash('flash_message', 'Grade successfully added!');

        return redirect()->route('fixed-schedules.grades.index', compact('schedule'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $schedule_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($schedule_id, $id)
    {
        $schedule = FixedSchedule::findOrFail($schedule_id);
        $grade = Grade::findOrFail($id);

        return view('fixed-schedules.grades.show', compact('schedule', 'grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $schedule_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($schedule_id, $student_id, $id)
    {
        $schedule = FixedSchedule::findOrFail($schedule_id);
        $student = Student::findOrFail($student_id);
        $grade = Grade::findOrFail($id);

        return view('fixed-schedules.grades.edit', compact('schedule', 'student', 'grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $schedule_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $schedule_id, $id)
    {
        $schedule = FixedSchedule::findOrFail($schedule_id);
        $grade = Grade::findOrFail($id);

        $input = $request->all();

        $grade->fill($input)->save();

        $request->session()->flash('flash_message', 'Grade successfully updated!');

        return redirect()->route('fixed-schedules.grades.index', compact('schedule'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $schedule_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($schedule_id, $id)
    {
        $schedule = FixedSchedule::findOrFail($schedule_id);
        $grade = Grade::findOrFail($id);

        dd($schedule);
    }
}
