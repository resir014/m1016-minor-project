@extends('app')

@section('title', 'View Attendance')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/fixed-schedules') }}">Fixed Schedules</a></li>
    <li>
        <a href="{{ route('fixed-schedules.show', $schedule->id) }}">
            Schedule ID: {{ $schedule->id }}
        </a>
    </li>
    <li><a href="{{ route('fixed-schedules.attendance.index', $schedule->id) }}">Attendance</a></li>
    <li class="active">View Attendance</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Edit Attendance Form</h1>
    <p class="lead">Schedule ID: {{ $schedule->id }}</p>
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

    <h2>Student List</h2>

    {!! Form::open([
        'method' => 'PATCH',
        'route' => ['fixed-schedules.attendance.update', $schedule->id, $attendance->id]
    ]) !!}
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
                    <td>{{ $student->name }}</td>
                    <td>{!! Form::checkbox('student_list[]', $student->id, $checked) !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('fixed-schedules.attendance.index', $schedule->id) }}" class="btn btn-default">Back</a>
    <div class="pull-right">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

</div>
@endsection
