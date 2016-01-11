<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FixedSchedule;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExcelExportController extends Controller
{
    public function getFixedSchedules()
    {
        $excel = \App::make('excel');

        $excel->create('Filename', function ($excel) {
            $excel->sheet('Sheet 1', function ($sheet) {
                $query = \DB::table('fixed_schedules')->select('id', 'schedule_draft_id', 'lecturer_id', 'course_id', 'room_id', 'day', 'shift')->get();

                $sheet->fromArray(json_decode(json_encode($query), true));
            });
        })->download('xlsx');
    }

    public function getClassRealisation($schedule_id) {
        $excel = \App::make('excel');

        \Excel::create('Filename', function ($excel) {
            $excel->sheet('Sheet 1', function ($sheet) {
                $sheet->fromArray(FixedSchedule::all()->toArray());
            });
        })->download('xlsx');
    }
}
