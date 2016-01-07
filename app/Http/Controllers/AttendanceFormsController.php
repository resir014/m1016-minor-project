<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AttendanceForm;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AttendanceFormsController extends Controller
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
        $attendanceForms = AttendanceForm::all();

        return view('attendance.index', compact('attendanceForms'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendanceForm = AttendanceForm::findOrFail($id);

        return $attendanceForm;
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
