@extends('app')

@section('title', 'Create Session Log')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ route('fixed-schedules.index') }}">Fixed Schedules</a></li>
    <li>
        <a href="{{ route('fixed-schedules.show', $schedule->id) }}">
            Schedule ID: {{ $schedule->id }}
        </a>
    </li>
    <li><a href="{{ route('fixed-schedules.session-log.index', $schedule->id) }}">Session Logs</a></li>
    <li class="active">View Session Log</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Session Log</h1>
    <p class="lead">Schedule ID: {{ $schedule->id }} | Session Log ID: {{ $sessionLog->id }}</p>
    <hr>

    <h2>Course Details</h2>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Schedule ID</th>
                    <th>Course</th>
                    <th>Lecturer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $schedule->id }}</td>
                    <td>{{ $schedule->course_id }}</td>
                    <td>{{ $schedule->scheduleDraft->lecturer->id }} - {{ $schedule->scheduleDraft->lecturer->user->name }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Present</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedule->students as $i => $student)
                <?php $checked = in_array($student->id, $checkeds) ? true : false; ?>
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->user->name }}</td>
                    <td>{!! Form::checkbox('student_list[]', $student->id, $checked) !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h2>Remarks</h2>

    <p>{{ $sessionLog->remarks }}</p>

    <hr>

    <a href="{{ route('fixed-schedules.session-log.index', $schedule->id) }}" class="btn btn-default">Back</a>

</div>
@endsection
