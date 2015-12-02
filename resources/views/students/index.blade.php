@extends('app')

@section('content')
<div class="container">
    <h1>All Students</h1>
    <hr>

    @foreach($students as $student)
        <h3>{{ $student->id }} - {{ $user->name }}</h3>
        <p>Student</p>
        <p>
            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">View</a>
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit student</a>
        </p>
        <hr>
    @endforeach

    <!--div class="pull-right"-->
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add a student</a>
    <!--/div-->
</div>
@stop
