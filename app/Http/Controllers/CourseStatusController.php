<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CourseStatusController extends Controller
{
    /**
     * Create a new course status controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);

        //dd($course);

        return view('course-status.show')->with('course', $course);
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);

        //dd($course);

        return view('course-status.edit')->with('course', $course);
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $input = $request->all();

        $course->fill($input)->save();

        $request->session()->flash('flash_message', 'Status successfully updated!');

        return redirect()->back();
    }
}
