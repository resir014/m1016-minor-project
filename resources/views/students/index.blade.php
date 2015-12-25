@extends('app')

@section('title', 'All Students')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li class="active">Students</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1 class="page-header">All Students</h1>

    <div>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    </div>

    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Admission Year</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ date('d F Y', strtotime($student->birth_date)) }}</td>
                    <td>{{ $student->admission_year }}</td>
                    <td><a href="{{ route('students.show', $student->id) }}">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>

    <div>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    </div>
</div>
@endsection
