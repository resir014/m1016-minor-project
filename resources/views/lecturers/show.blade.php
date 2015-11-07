@extends('app')

@section('content')
<div class="container">
    <h1>{{ $lecturer->nomor_induk }} - {{ $lecturer->user->name }}</h1>
    <p class="lead">{{ $lecturer->spesialisasi }}</p>

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
