<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Http\Requests;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
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
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudentRequest $request)
    {
        $input = $request->all();

        Student::create($input);

        $request->session()->flash('flash_message', 'Student successfully added!');

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StudentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $input = $request->all();

        $student->fill([
            'name' => $request->name,
            'admission_year' => $request->admission_year,
            'birth_date' => $request->birth_date,
            'active' => $request->active
        ]);

        if ($request->password != '') {
            $student->fill([
                'password' => bcrypt($request->password)
            ]);
        }

        $student->save();

        $request->session()->flash('flash_message', 'Student successfully updated!');

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
        $student = Student::findOrFail($id);

        $student->delete();

        \Session::flash('flash_message', 'Student successfully deleted!');

        return redirect()->route('students.index');
    }
}
