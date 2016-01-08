<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ScheduleDraft;
use App\Semester;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ScheduleDraftsController extends Controller
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
            $scheduleDrafts = ScheduleDraft::all()->sortByDesc('semester_list');
        } else if ($user->userable_type == 'Lecturer') {
            $scheduleDrafts = $user->userable->scheduleDrafts->sortByDesc('semester_list');
        } else {
            abort(401);
        }

        return view('schedule-drafts.index', compact('scheduleDrafts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semesters = Semester::lists('name' , 'id');

        return view('schedule-drafts.create', compact('semesters'));
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

        $scheduleDraft = ScheduleDraft::create($input);

        $scheduleDraft->semesters()->attach($request->get('semester_list'));

        $request->session()->flash('flash_message', 'Schedule draft successfully added!');

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

        return view('schedule-drafts.show', compact('scheduleDraft'));
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
        $semesters = Semester::lists('name' , 'id');

        return view('schedule-drafts.edit', compact('scheduleDraft', 'semesters'));
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
        $semesters = Semester::lists('name' , 'id');

        $input = $request->all();

        $scheduleDraft->fill($input)->save();

        $scheduleDraft->semesters()->sync($request->input('semester_list'));

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

        \Session::flash('flash_message', 'Schedule draft successfully deleted!');

        return redirect()->route('schedule-drafts.index');
    }
}
