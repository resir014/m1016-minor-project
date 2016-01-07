<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttendanceForm;
use App\FixedSchedule;
use App\Student;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AttendanceFormFixedScheduleController extends Controller
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
    public function index($id)
    {
        $schedule = FixedSchedule::find($id);
        $attendanceForms = AttendanceForm::where('fixed_schedule_id', $id)->get();

        return view('fixed-schedules.attendance.index', compact('schedule', 'attendanceForms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $schedule = FixedSchedule::find($id);
        $students = Student::lists('name', 'id');

        return view('fixed-schedules.attendance.create', compact('schedule', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $fixedSchedule = FixedSchedule::find($id);
        $students = $fixedSchedule->students->lists('id');

        $student = Student::find($request->student_id);

        $input = $request->all();

        if ($request->student_password == $student->password) {
            $attendance = AttendanceForm::create($input);
            $attendance->students()->attach($request->student_list);
        } else {
            return redirect()->back()->withErrors(['Incorrect student password!']);
        }

        $request->session()->flash('flash_message', 'Attendance successfully posted!');

        return redirect()->back();
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
        $attendance = AttendanceForm::findOrFail($id);
        $schedule = FixedSchedule::findOrFail($schedule_id);
        $students = Student::lists('name', 'id');

        // Temp variable for checking if student is checked
        $checkeds = $attendance->students()->lists('id')->toArray();

        return view('fixed-schedules.attendance.show', compact('attendance', 'schedule', 'students', 'checkeds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $schedule_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($schedule_id, $id)
    {
        $attendance = AttendanceForm::findOrFail($id);
        $schedule = FixedSchedule::findOrFail($schedule_id);
        $students = Student::lists('name', 'id');

        // Temp variable for checking if student is checked
        $checkeds = $attendance->students()->lists('id')->toArray();

        return view('fixed-schedules.attendance.edit', compact('attendance', 'schedule', 'students', 'checkeds'));
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
        $attendance = AttendanceForm::findOrFail($id);
        $students = Student::lists('name', 'id');

        $input = $request->all();

        $attendance->fill($input);
        $attendance->students()->sync($request->student_list);

        $attendance->save();

        $request->session()->flash('flash_message', 'Attendance successfully updated!');

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
        //
    }
}
