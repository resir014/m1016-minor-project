@extends('app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/lecturers') }}">Lecturers</a></li>
        <li class="active">{{ $lecturer->id }} - {{ $lecturer->user->name }}</li>
    </ol>

    <h1>View Lecturer Details</h1>
    <p class="lead">{{ $lecturer->id }} - {{ $lecturer->user->name }}</p>

    <hr>

    <p>
        Spesialisasi: {{ $lecturer->spesialisasi }}
    </p>

    <a href="{{ route('lecturers.index') }}" class="btn btn-info">Back to all lecturers</a>
    <a href="{{ route('lecturers.edit', $lecturer->id) }}" class="btn btn-primary">Edit lecturer</a>

    <div class="pull-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['lecturers.destroy', $lecturer->id]
        ]) !!}
            {!! Form::submit('Delete this lecturer?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
