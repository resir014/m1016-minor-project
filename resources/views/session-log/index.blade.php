@extends('app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li class="active">Session Logs</li>
</ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <h1 class="page-header">Session Logs</h1>

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
                        <td>@{{ $schedule->id }}</td>
                        <td>@{{ $lecturer->id }} - @{{ $lecturer->name }}</td>
                        <td>@{{ $course->id }} - @{{ $course->name }}</td>
                        <td>@{{ $room->id }}</td>
                        <td>@{{ $schedule->day }}</td>
                        <td>@{{ $schedule->shift }}</td>
                        <td><a href="{{ url('/session-log/create') }}">View</a></td>
                    </tr>
                    <tr>
                        <td>@{{ $schedule->id }}</td>
                        <td>@{{ $lecturer->id }} - @{{ $lecturer->name }}</td>
                        <td>@{{ $course->id }} - @{{ $course->name }}</td>
                        <td>@{{ $room->id }}</td>
                        <td>@{{ $schedule->day }}</td>
                        <td>@{{ $schedule->shift }}</td>
                        <td><a href="{{ url('/session-log/create') }}">View</a></td>
                    </tr>
                    <tr>
                        <td>@{{ $schedule->id }}</td>
                        <td>@{{ $lecturer->id }} - @{{ $lecturer->name }}</td>
                        <td>@{{ $course->id }} - @{{ $course->name }}</td>
                        <td>@{{ $room->id }}</td>
                        <td>@{{ $schedule->day }}</td>
                        <td>@{{ $schedule->shift }}</td>
                        <td><a href="{{ url('/session-log/create') }}">View</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
