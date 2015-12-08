@extends('app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li class="active">Students</li>
    </ol>

    <h1 class="page-header">All Students</h1>

    <div>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add a student</a>
    </div>

    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Tanggal Lahir</th>
                <th>Tahun Masuk</th>
                <th>Nilai Tugas</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Sumatif</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>@if($student->user) {{ $student->user->name }} @else N/A @endif</td>
                <td>{{ $student->birth_date }}</td>
                <td>{{ $student->admission_year }}</td>
                <td>{{ $student->nilai_tugas }}</td>
                <td>{{ $student->nilai_uts }}</td>
                <td>{{ $student->nilai_uas }}</td>
                <td>{{ $student->nilai_sumatif }}</td>
                <td><a href="{{ route('students.show', $student->id) }}">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <div>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add a student</a>
    </div>
</div>
@stop
