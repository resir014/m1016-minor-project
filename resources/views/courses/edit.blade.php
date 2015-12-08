@extends('app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/courses') }}">Courses</a></li>
        <li class="active">Edit Course</li>
    </ol>

    <h1>Editing Course Details</h1>
    <p class="lead">{{ $course->id }} - {{ $course->name }}</p>

    <hr>

    {!! Form::model($course, [
        'method' => 'PATCH',
        'route' => ['courses.update', $course->id]
    ]) !!}

    @include('courses.partials.form', ['buttonText' => 'Save'])

    {!! Form::close() !!}
</div>

@stop
