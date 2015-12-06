<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScheduleDraft;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ScheduleDraftsController extends Controller
{
    /**
     * Create a new profiles controller instance.
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
        return view('schedule-drafts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedule-drafts.create');
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

        ScheduleDraft::create($input);

        $request
            ->session()
            ->flash('flash_message', 'Schedule draft successfully added!');

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
        $scheduleDraft = ScheduleDraft::findOrFail($id);

        return view('schedule-drafts.show')->with('scheduleDraft', $scheduleDraft);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scheduleDraft = ScheduleDraft::findOrFail($id);

        return view('schedule-drafts.edit')->with('scheduleDraft', $scheduleDraft);
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
        $scheduleDraft = ScheduleDraft::findOrFail($id);

        $input = $request->all();

        $scheduleDraft->fill($input)->save();

        $request->session()->flash('flash_message', 'Schedule draft successfully updated!');

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
        $scheduleDraft = ScheduleDraft::findOrFail($id);

        $scheduleDraft->delete();

        return redirect()->route('schedule-drafts.index');
    }
}
