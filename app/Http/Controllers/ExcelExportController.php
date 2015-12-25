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

        \Excel::create('Filename', function($excel) {

            $excel->sheet('Sheet 1', function($sheet) {
                $sheet->fromArray(FixedSchedule::all()->toArray());
            });

        })->download('xlsx');
    }
}
