@extends('app')

@section('title', 'View Student Profile')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/students') }}">Students</a></li>
    <li class="active">{{ $student->id }} - {{ $student->name }}</li>
</ol>
@endsection

@section('content')
<div class="container">
    <h1>Viewing Student Profile</h1>
    <p class="lead">{{ $student->id }} - {{ $student->name }}</p>

    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Admission Year</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ date('d F Y', strtotime($student->birth_date)) }}</td>
                    <td>{{ $student->admission_year }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr>

    <a href="{{ route('students.index') }}" class="btn btn-default">Back to all students</a>
    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit student</a>

    <div class="pull-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['students.destroy', $student->id]
        ]) !!}
            {!! Form::submit('Delete this student?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection
