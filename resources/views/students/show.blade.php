@extends('app')

@section('content')
<div class="container">
    <h1>{{ $student->id }} - {{ $student->name }}</h1>
    <p class="lead">Student</p>

    <hr>

    <p>
        Tahun Masuk: {{ $student->tahun_masuk }}
    </p>

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
