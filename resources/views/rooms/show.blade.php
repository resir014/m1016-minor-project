@extends('app')

@section('title', 'View Room Details')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/rooms') }}">Rooms</a></li>
    <li class="active">{{ $room->id }} - {{ $room->name }}</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>View Room Details</h1>
    <p class="lead">{{ $room->id }} - {{ $room->name }}</p>

    <hr>

    <p>
        Lokasi: {{ $room->location }}
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
@endsection
