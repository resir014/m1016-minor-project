@extends('app')

@section('title', 'Attendance Forms')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ route('fixed-schedules.index') }}">Fixed Schedules</a></li>
    <li>
        <a href="{{ route('fixed-schedules.show', $schedule->id) }}">
            Schedule ID: {{ $schedule->id }}
        </a>
    </li>
    <li class="active">Attendance</li>
</ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <h1>Attendance Forms</h1>
            <p class="lead">Schedule ID: {{ $schedule->id }}</p>
            <hr>

            @if (Auth::user()->userable_type === 'Lecturer')
            <div>
                <a href="{{ route('fixed-schedules.attendance.create', $schedule->id) }}" class="btn btn-primary">Post Attendance</a>
            </div>
            @endif

            <hr>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Course</th>
                            <th>Lecturer</th>
                            <th>Class</th>
                            <th>Date</th>
                            <th>Number of Students</th>
                            <th>Log Posted?</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendanceForms as $i => $attendance)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $attendance->fixedSchedule->course_id }} - {{ $attendance->fixedSchedule->course->name }}</td>
                                <td>{{ $attendance->fixedSchedule->lecturer_id }} - {{ $attendance->fixedSchedule->lecturer->user->name }}</td>
                                <td>{{ $attendance->fixedSchedule->scheduleDraft->class_id }}</td>
                                <td>{{ date('d F Y', strtotime($attendance->created_at)) }}</td>
                                <td>{{ $attendance->students->count() }}/{{ $attendance->fixedSchedule->students->count() }}</td>
                                <td>
                                    @if($attendance->sessionLog)
                                        <span class="text-success">Yes</span>
                                    @else
                                        <span class="text-danger">No</span>
                                    @endif
                                </td>
                                @if (Auth::user()->userable_type === 'Admin')
                                    <td><a href="{{ route('fixed-schedules.attendance.edit', ['schedule_id' => $attendance->fixedSchedule->id, 'id' => $attendance->id]) }}">Edit Attendance</a></td>
                                @else
                                    <td><a href="{{ route('fixed-schedules.attendance.show', ['schedule_id' => $attendance->fixedSchedule->id, 'id' => $attendance->id]) }}">View Attendance</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <hr>

            @if (Auth::user()->userable_type === 'Lecturer')
            <div>
                <a href="{{ route('fixed-schedules.attendance.create', $schedule->id) }}" class="btn btn-primary">Post Attendance</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
