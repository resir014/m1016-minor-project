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
    <li class="active">Student Grades</li>
</ol>
@endsection

@section('content')
<div class="container">
    <h1>Student Grades</h1>
    <p class="lead">Schedule ID: {{ $schedule->id }} | Course ID: {{ $schedule->course->id }}</p>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Assignment Score</th>
                <th>Midterm Score</th>
                <th>Finals Score</th>
                <th>Total Score</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedule->students as $i => $student)
                @if($student->grades->count() == 0)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>Add Grades</td>
                    </tr>
                @endif
            @endforeach
            @foreach($grades as $i => $grade)
                <tr>
                    <td>{{ $grade->student->id }}</td>
                    <td>{{ $grade->student->name }}</td>
                    <td>{{ $grade->assignment_score }}</td>
                    <td>{{ $grade->midterm_score }}</td>
                    <td>{{ $grade->final_score }}</td>
                    <td>{{ $grade->total_score }}</td>
                    <td>Edit</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
