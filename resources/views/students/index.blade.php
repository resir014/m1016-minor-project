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
                    <td>{{ date('d F Y', strtotime($student->birth_date)) }}</td>
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
    </div>

    <hr>

    <div>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    </div>
</div>
@endsection
