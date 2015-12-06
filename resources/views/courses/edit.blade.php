@extends('app')

@section('content')
<div class="container">
    <h1>Editing {{ $course->id }} - {{ $course->name }}</h1>
    <p class="lead">Course details</p>

    <hr>

    {!! Form::model($course, [
        'method' => 'PATCH',
        'route' => ['courses.update', $course->id]
    ]) !!}

    @include('courses.partials.form', ['buttonText' => 'Save'])

    {!! Form::close() !!}
</div>

@stop
