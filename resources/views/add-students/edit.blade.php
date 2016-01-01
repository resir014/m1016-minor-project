@extends('app')

@section('title', 'View Fixed Schedule')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/fixed-schedules') }}">Fixed Schedules</a></li>
    <li>
        <a href="{{ route('fixed-schedules.show', $fixedSchedule->id) }}">
            Schedule ID: {{ $fixedSchedule->id }}
        </a>
    </li>
    <li class="active">Add Students</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Add Students</h1>
    <p class="lead">Schedule ID: {{ $fixedSchedule->id }}</p>
    <hr>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Schedule Details</h3>
                </div>
                <div class="panel-body">
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
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Students List</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fixedSchedule->students as $i => $student)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['add-students.destroy', $student->id]
                                            ]) !!}
                                                {!! Form::submit('Remove', ['class' => 'btn btn-link btn-xs']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add a Student</h3>
                </div>
                <div class="panel-body">
                    {!! Form::model($fixedSchedule, [
                        'method' => 'PATCH',
                        'route' => ['add-students.update', $fixedSchedule->id]
                    ]) !!}

                    <div class="form-group" id="bloodhound-courses">
                        {!! Form::label('course_id', 'Course ID', ['class' => 'control-label']) !!}
                        {!! Form::hidden('course_id', $fixedSchedule->course_id) !!}
                        <p class="form-control-static">{{ $fixedSchedule->course_id }}</p>
                    </div>

                    <div class="form-group" id="bloodhound-students">
                        {!! Form::label('student_id', 'Student ID', ['class' => 'control-label']) !!}
                        {!! Form::text('student_id', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="pull-right">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <hr>

    <a href="{{ route('fixed-schedules.show', $fixedSchedule->id) }}" class="btn btn-info">Back</a>
</div>
@endsection
