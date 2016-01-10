@extends('app')

@section('title', 'View Fixed Schedule')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/fixed-schedules') }}">Fixed Schedules</a></li>
    <li class="active">Schedule ID: {{ $fixedSchedule->id }}</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Viewing Schedule</h1>
    <p class="lead">Schedule ID: {{ $fixedSchedule->id }}</p>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Draft ID</th>
                            <th>Lecturer</th>
                            <th>Course</th>
                            <th>Room</th>
                            <th>Day</th>
                            <th>Shift</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $fixedSchedule->scheduleDraft->id }}</td>
                            <td>{{ $fixedSchedule->scheduleDraft->lecturer->id }} - {{ $fixedSchedule->scheduleDraft->lecturer->user->name }}</td>
                            <td>{{ $fixedSchedule->scheduleDraft->course->id }} - {{ $fixedSchedule->scheduleDraft->course->name }}</td>
                            <td>{{ $fixedSchedule->room_id }}</td>
                            <td>{{ $fixedSchedule->day }}</td>
                            <td>{{ $fixedSchedule->shift }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>

    <a href="{{ route('fixed-schedules.index') }}" class="btn btn-default">Back to index</a>
    <a href="{{ route('fixed-schedules.edit', $fixedSchedule->id) }}" class="btn btn-primary">Update Schedule</a>
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('fixed-schedules.attendance.index', $fixedSchedule->id) }}">View Attendance</a>
        <a class="btn btn-info" href="{{ route('fixed-schedules.grades.index', $fixedSchedule->id) }}">View Grades</a>
        <a class="btn btn-info" href="{{ route('fixed-schedules.add-student.index', $fixedSchedule->id) }}">Add/Remove Students</a>
    </div>
</div>
@endsection
