@extends('app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li class="active">Courses</li>
    </ol>

    <h1 class="page-header">All Courses</h1>

    <div>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Create a course</a>
    </div>

    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Name</th>
                <th>Credits</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
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
                <td><a href="{{ route('courses.show', $course->id) }}">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Create a course</a>
    </div>
</div>
@stop
