@extends('app')

@section('title', 'Post Attendance')

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
    <li class="active">Post Attendance</li>
</ol>
@endsection

@section('content')
@if($errors->any())
    <div class="container">
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

{!! Form::open([
    'route' => ['fixed-schedules.attendance.store', $schedule->id]
]) !!}
<div class="container">

    <h1>Attendance Form</h1>
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
                    <td>
                        {!! Form::hidden('fixed_schedule_id', $schedule->id) !!}
                        {{ $schedule->id }}
                    </td>
                    <td>
                        {!! Form::hidden('course_id', $schedule->course_id) !!}
                        {{ $schedule->course_id }}
                    </td>
                    <td>
                        {!! Form::hidden('lecturer_id', $schedule->scheduleDraft->lecturer->id) !!}
                        {{ $schedule->scheduleDraft->lecturer->id }} - {{ $schedule->scheduleDraft->lecturer->user->name }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <h2>Student List</h2>

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
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->user->name }}</td>
                    <td>{!! Form::checkbox('student_list[]', $student->id) !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pull-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verify">
            Submit
        </button>
    </div>
    <a href="{{ route('fixed-schedules.attendance.index') }}" class="btn btn-default">Back</a>
</div>

<!-- Modal -->
<div class="modal fade" id="verify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Attendance Verification</h4>
            </div>
            <div class="modal-body">
                <div class="form-group" id="bloodhound-students">
                    {!! Form::label('student_id', 'Student ID', ['class' => 'control-label']) !!}
                    {!! Form::text('student_id', null, ['class' => 'form-control typeahead']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('student_password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('student_password', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="student_agreed"> I agree that the information entered were correct.
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection
