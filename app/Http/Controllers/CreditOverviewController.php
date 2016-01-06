<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecturer;
use App\ScheduleDraft;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CreditOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::has('scheduleDrafts')->get();

        // foreach ($lecturers as $lecturer) {
        //     $courseCredits = $this->calculateCourseCredits($lecturer);
        // }

        return view('credit-overview.index', compact('lecturers'));
    }

    /*public function calculateCourseCredits($lecturer)
    {
        $courseCredits = 0;

        foreach ($lecturer->scheduleDrafts->sortByDesc('class') as $i => $scheduleDraft) {
            if (isset($scheduleDraft[$i-1])) {
                $prev = $scheduleDraft[$i-1];

                if ($scheduleDraft->class_id != $prev->class_id) {
                    $courseCredits += $scheduleDraft->course->credits;
                }
            }
        }

        return $courseCredits;
    }*/
}
