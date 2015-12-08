@extends('app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/courses') }}">Courses</a></li>
        <li class="active">{{ $course->id }} - {{ $course->name }}</li>
    </ol>

    <h1>Viewing Course</h1>
    <p class="lead">{{ $course->id }} - {{ $course->name }}</p>

    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Name</th>
                <th>Credits</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->credits }}</td>
                <td>
                    @if($course->active)
                        <span class="text-success">Active</span>
                    @else
                        <span class="text-danger">Inactive</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <hr>

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
