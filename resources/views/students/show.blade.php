@extends('app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/students') }}">Students</a></li>
        <li class="active">{{ $student->id }} - {{ $student->user->name }}</li>
    </ol>

    <h1>View Student Profile</h1>
    <p class="lead">{{ $student->id }} - {{ $student->user->name }}</p>

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
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->user->name }}</td>
                <td>{{ $student->birth_date }}</td>
                <td>{{ $student->admission_year }}</td>
                <td>{{ $student->nilai_tugas }}</td>
                <td>{{ $student->nilai_uts }}</td>
                <td>{{ $student->nilai_uas }}</td>
                <td>{{ $student->nilai_sumatif }}</td>
            </tr>
        </tbody>
    </table>

    <hr>

    <a href="{{ route('students.index') }}" class="btn btn-info">Back to all students</a>
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
@stop
