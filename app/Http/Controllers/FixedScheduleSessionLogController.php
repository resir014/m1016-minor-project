<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FixedSchedule;
use App\SessionLog;
use App\AttendanceForm;
use App\Student;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FixedScheduleSessionLogController extends Controller
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
        $sessionLogs = SessionLog::where('fixed_schedule_id', $schedule_id)->get();

        return view('fixed-schedules.session-log.index', compact('schedule', 'sessionLogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $schedule_id
     * @param  int  $attendance_id
     * @return \Illuminate\Http\Response
     */
    public function create($schedule_id, $attendance_id)
    {
        $schedule = FixedSchedule::findOrFail($schedule_id);
        $attendance = AttendanceForm::findOrFail($attendance_id);

        $checkeds = $attendance->students()->lists('id')->toArray();

        return view('fixed-schedules.session-log.create', compact('schedule', 'attendance', 'checkeds'));
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

        $student = Student::find($request->student_id);

        $input = $request->all();

        if (\Hash::check($request->student_password, $student->user->password)) {
            if ($request->student_agreed) {
                if (in_array($request->student_id, $students->toArray())) {
                    $sessionLog = SessionLog::create($input);
                } else {
                    return redirect()->back()->withErrors(['That student doesn\'t exist in this class!']);
                }
            } else {
                return redirect()->back()->withErrors(['You haven\'t agreed yet!']);
            }
        } else {
            return redirect()->back()->withErrors(['Incorrect student password!']);
        }

        $request->session()->flash('flash_message', 'Session Log successfully posted!');

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
        $schedule = FixedSchedule::findOrFail($schedule_id);
        $sessionLog = SessionLog::findOrFail($id);
        $attendance = AttendanceForm::where('fixed_schedule_id', $schedule_id)->first();

        $checkeds = $attendance->students()->lists('id')->toArray();

        return view('fixed-schedules.session-log.show', compact('schedule', 'sessionLog', 'attendance', 'checkeds'));
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
        $schedule = FixedSchedule::findOrFail($schedule_id);
        $sessionLog = SessionLog::findOrFail($id);

        return $sessionLog;
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
        $sessionLog = SessionLog::findOrFail($id);

        $input = $request->all();

        dd($input);
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
        $sessionLog = SessionLog::findOrFail($id);

        dd($sessionLog);
    }
}
