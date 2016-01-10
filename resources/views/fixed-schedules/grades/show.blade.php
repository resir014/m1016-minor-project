@extends('app')

@section('title', 'Grades')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ route('fixed-schedules.index') }}">Fixed Schedules</a></li>
    <li>
        <a href="{{ route('fixed-schedules.show', $schedule->id) }}">
            Schedule ID: {{ $schedule->id }}
        </a>
    </li>
    <li>
        <a href="{{ route('fixed-schedules.grades.index', $schedule->id) }}">
            Student Grades
        </a>
    </li>
    <li class="active">View Student Grade</li>
</ol>
@endsection

@section('content')
<div class="container">
    <h1>View Student Grade</h1>
    <p class="lead">Schedule ID: {{ $schedule->id }} | Course ID: {{ $schedule->course->id }} | Student ID: {{ $grade->student->id }}</p>
    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Assignment Score</th>
                    <th>Midterm Score</th>
                    <th>Finals Score</th>
                    <th>Total Score</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $grade->student->id }}</td>
                    <td>{{ $grade->student->name }}</td>
                    <td>{{ $grade->assignment_score }}</td>
                    <td>{{ $grade->midterm_score }}</td>
                    <td>{{ $grade->final_score }}</td>
                    <td>{{ $grade->total_score }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
