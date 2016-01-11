@extends('app')

@section('title', 'Grades')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ route('fixed-schedules.index') }}">Fixed Schedules</a></li>
    <li>
        <a href="{{ route('fixed-schedules.show', $schedule->id) }}">
            Schedule ID: {{ $schedule->id }}
        </a>
    </li>
    <li>
        <a href="{{ route('fixed-schedules.grades.index', $schedule->id) }}">
            Student Grades
        </a>
    </li>
    <li class="active">Edit Student Grade</li>
</ol>
@endsection

@section('content')
<div class="container">
    <h1>Edit Student Grade</h1>
    <p class="lead">Schedule ID: {{ $schedule->id }} | Student ID: {{ $student->id }} | Course ID: {{ $schedule->course->id }}</p>
    <hr>

    {!! Form::model($grade, [
        'method' => 'PATCH',
        'route' => ['fixed-schedules.grades.update', $schedule->id, $grade->id]
    ]) !!}

    {!! Form::hidden('fixed_schedule_id', $schedule->id) !!}
    {!! Form::hidden('student_id', $student->id) !!}
    {!! Form::hidden('course_id', $schedule->course->id) !!}

    @include('fixed-schedules.grades.partials.form')

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
</div>
@endsection
