@extends('app')

@section('title', 'Session Logs')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ route('fixed-schedules.index') }}">Fixed Schedules</a></li>
    <li>
        <a href="{{ route('fixed-schedules.show', $schedule->id) }}">
            Schedule ID: {{ $schedule->id }}
        </a>
    </li>
    <li class="active">Session Logs</li>
</ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <h1 class="page-header">Session Logs</h1>

            <div class="table-responsive">
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
                        @foreach($sessionLogs as $i => $sessionLog)
                        <tr>
                            <td>{{ $sessionLog->fixedSchedule->id }}</td>
                            <td>{{ $sessionLog->fixedSchedule->lecturer->id }} - {{ $sessionLog->fixedSchedule->lecturer->user->name }}</td>
                            <td>{{ $sessionLog->fixedSchedule->course->id }} - {{ $sessionLog->fixedSchedule->course->name }}</td>
                            <td>{{ $sessionLog->fixedSchedule->room_id }}</td>
                            <td>{{ $sessionLog->fixedSchedule->day }}</td>
                            <td>{{ $sessionLog->fixedSchedule->shift }}</td>
                            <td><a href="{{ route('fixed-schedules.session-log.show', ['schedule_id' => $schedule->id, 'id' => $sessionLog->id]) }}">View</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
