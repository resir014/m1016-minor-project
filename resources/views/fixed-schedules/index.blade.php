@extends('app')

@section('title', 'Fixed Schedules')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li class="active">Fixed Schedules</li>
</ol>
@endsection

@section('content')
<div class="container">

    @if(Auth::user()->userable_type === 'Admin')
    <h1 class="page-header">View Schedules</h1>
    @else
    <h1 class="page-header">My Schedules</h1>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Fixed Schedule ID</th>
                <th>Schedule Draft ID</th>
                <th>Lecturer</th>
                <th>Course</th>
                <th>Room</th>
                <th>Day</th>
                <th>Shift</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($fixedSchedules as $fixedSchedule)
            <tr>
                <td>{{ $fixedSchedule->id }}</td>
                <td>{{ $fixedSchedule->scheduleDraft->id }}</td>
                <td>{{ $fixedSchedule->scheduleDraft->lecturer->id }} - {{ $fixedSchedule->scheduleDraft->lecturer->user->name }}</td>
                <td>{{ $fixedSchedule->scheduleDraft->course->id }} - {{ $fixedSchedule->scheduleDraft->course->name }}</td>
                <td>{{ $fixedSchedule->room_id }}</td>
                <td>{{ $fixedSchedule->day }}</td>
                <td>{{ $fixedSchedule->shift }}</td>
                <td><a href="{{ route('fixed-schedules.show', $fixedSchedule->id) }}">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
