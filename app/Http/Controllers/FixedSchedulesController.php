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
        $fixedSchedules = FixedSchedule::all();

        return view('fixed-schedules.index')->with('fixedSchedules', $fixedSchedules);
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

        return view('fixed-schedules.create')->with('scheduleDraft', $scheduleDraft);
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
        // dd($input);

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

        return view('fixed-schedules.show')->with('fixedSchedule', $fixedSchedule);
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

        return view('fixed-schedules.edit')->with('fixedSchedule', $fixedSchedule);
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
}
