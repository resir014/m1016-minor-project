@extends('app')

@section('content')
<div class="container">
    <h1>{{ $room->number }} - {{ $room->name }}</h1>
    <p class="lead">{{ $room->type }}</p>

    <hr>

    <p>
        {{ $room->location }}
    </p>

    <a href="{{ route('rooms.index') }}" class="btn btn-info">Back to all rooms</a>
    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary">Edit Room</a>

    <div class="pull-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['rooms.destroy', $room->id]
        ]) !!}
            {!! Form::submit('Delete this room?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
