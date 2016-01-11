<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FixedSchedule;
use App\ScheduleDraft;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FixedSchedulesController extends Controller
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

        if ($user->userable_type == 'Admin') {
            $fixedSchedules = FixedSchedule::all();
        } else if ($user->userable_type == 'Lecturer') {
            $fixedSchedules = $user->userable->fixedSchedules;
        } else {
            abort(401);
        }

        return view('fixed-schedules.index', compact('fixedSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $scheduleDraft = ScheduleDraft::findOrFail($id);

        // dd($scheduleDraft);

        return view('fixed-schedules.create', compact('scheduleDraft'));
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

        FixedSchedule::create($input);

        $request
            ->session()
            ->flash('flash_message', 'Schedule successfully published!');

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
        $fixedSchedule = FixedSchedule::findOrFail($id);

        return view('fixed-schedules.show', compact('fixedSchedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fixedSchedule = FixedSchedule::findOrFail($id);

        return view('fixed-schedules.edit', compact('fixedSchedule'));
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
        $fixedSchedule = FixedSchedule::findOrFail($id);

        $input = $request->all();

        dd($input);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fixedSchedule = FixedSchedule::findOrFail($id);

        dd($fixedSchedule);

        // $fixedSchedule->delete();

        // return redirect()->route('fixed-schedules.index');
    }

    public function printPage($id) {
        $fixedSchedule = FixedSchedule::findOrFail($id);
        $students = $fixedSchedule->students;
        $attendances = $fixedSchedule->attendanceForms;
        $grades = $fixedSchedule->grades;

        return view('fixed-schedules.print', compact('fixedSchedule', 'students', 'attendances', 'grades'));
    }
}
