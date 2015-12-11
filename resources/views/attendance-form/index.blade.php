@extends('app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li class="active">Attendance</li>
</ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <h1 class="page-header">Attendance Form</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th>Schedule ID</th>
                        <th>Lecturer</th>
                        <th>Course</th>
                        <th>Room</th>
                        <th>Day</th>
                        <th>Shift</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>@{{ $fixedSchedule->id }}</td>
                        <td>@{{ $fixedSchedule->scheduleDraft->lecturer->id }} - @{{ $fixedSchedule->scheduleDraft->lecturer->user->name }}</td>
                        <td>@{{ $fixedSchedule->scheduleDraft->course->id }} - @{{ $fixedSchedule->scheduleDraft->course->name }}</td>
                        <td>@{{ $fixedSchedule->room_id }}</td>
                        <td>@{{ $fixedSchedule->day }}</td>
                        <td>@{{ $fixedSchedule->shift }}</td>
                        <td><a href="{{ url('/attendance-form/create') }}">View</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
