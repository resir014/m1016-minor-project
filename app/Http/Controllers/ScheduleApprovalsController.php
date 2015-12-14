<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScheduleApproval;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ScheduleApprovalsController extends Controller
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
        $scheduleApprovals = ScheduleApproval::all();

        return view('schedule-approvals.index')->with('scheduleApprovals', $scheduleApprovals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedule-approvals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ScheduleApproval::create([
            'lecturer_id' => $request->lecturer_id,
            'days' => implode(', ', $request->days),
            'shifts' => implode(', ', $request->shifts),
            'cleared' => true
        ]);

        $request->session()->flash('flash_message', 'Schedule Approval form successfully created!');

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
        $scheduleApproval = ScheduleApproval::findOrFail($id);

        return view('schedule-approvals.show')->with('scheduleApproval', $scheduleApproval);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
