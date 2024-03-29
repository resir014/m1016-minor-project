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
        $students = Student::lists('id');

        return view('fixed-schedules.attendance.create', compact('schedule', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $schedule = FixedSchedule::find($id);
        $students = $schedule->students->lists('id');

        $student = Student::find($request->student_id);

        $input = $request->all();

        // The hard stuff goes here - verifying student password

        if (\Hash::check($request->student_password, $student->user->password)) {
            // Password hashes match
            if ($request->student_agreed) {
                // Student has checked the 'I agree' button
                if (in_array($request->student_id, $students->toArray())) {
                    // If student exists, write down the form.
                    $attendance = AttendanceForm::create($input);
                    $attendance->students()->attach($request->student_list);
                } else {
                    return redirect()->back()->withErrors(['That student doesn\'t exist in this class!']);
                }
            } else {
                return redirect()->back()->withErrors(['You haven\'t agreed yet!']);
            }
        } else {
            return redirect()->back()->withErrors(['Incorrect student password!']);
        }

        // Lists all checked students
        $checkeds = $attendance->students()->lists('id')->toArray();

        $request->session()->flash('flash_message', 'Attendance successfully posted!');

        return view('fixed-schedules.session-log.create', compact('schedule', 'attendance', 'checkeds'));
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
        $students = Student::lists('id');

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
        $students = Student::lists('id');

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
        $students = Student::lists('id');

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
        $attendance = AttendanceForm::findOrFail($id);

        $attendance->delete();

        \Session::flash('flash_message', 'Attedance Form successfully deleted!');

        return redirect()->route('courses.index');
    }
}
