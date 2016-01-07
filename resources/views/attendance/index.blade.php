@extends('app')

@section('title', 'Attendance Forms')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li class="active">All Attendance</li>
</ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <h1 class="page-header">All Attendance Forms</h1>

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
                            @if (Auth::user()->userable_type === 'Admin')
                            <th></th>
                            @endif
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
                            @if (Auth::user()->userable_type === 'Admin')
                            <td><a href="{{ route('fixed-schedules.attendance.edit', ['schedule_id' => $attendance->fixedSchedule->id, 'id' => $attendance->id]) }}">Edit Attendance</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
