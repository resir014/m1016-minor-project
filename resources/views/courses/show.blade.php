@extends('app')

@section('content')
<div class="container">
    <h1>{{ $course->code }} - {{ $course->name }}</h1>
    <p class="lead">Course details</p>

    <hr>

    <p>
        Course Credits: {{ $course->credits }}
    </p>

    <a href="{{ route('courses.index') }}" class="btn btn-default">Back to all courses</a>
    <a href="{{ route('course-status.show', $course->id) }}" class="btn btn-info">Update status</a>
    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">Edit course</a>

    <div class="pull-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['courses.destroy', $course->id]
        ]) !!}
            {!! Form::submit('Delete this course?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
