@extends('app')

@section('title', 'Edit Course')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/courses') }}">Courses</a></li>
    <li class="active">Edit Course</li>
</ol>
@endsection

@section('content')
<div class="container">

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

@endsection
