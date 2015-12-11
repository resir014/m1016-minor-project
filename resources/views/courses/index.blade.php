@extends('app')

@section('title', 'All Courses')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li class="active">Courses</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1 class="page-header">All Courses</h1>

    <div>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Add Course</a>
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
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Add Course</a>
    </div>
</div>
@endsection
