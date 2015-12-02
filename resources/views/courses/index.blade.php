@extends('app')

@section('content')
<div class="container">
    <h1>All Courses</h1>
    <hr>

    @foreach($courses as $course)
        <h3>{{ $course->code }} - {{ $course->name }}</h3>
        <p> Course Credits: {{ $course->credits }}</p>
        <p>
            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info">View course</a>
        </p>
        <hr>
    @endforeach

    <!--div class="pull-right"-->
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Create a course</a>
    <!--/div-->
</div>
@stop
