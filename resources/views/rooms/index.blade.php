@extends('app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li class="active">Rooms</li>
    </ol>

    <h1 class="page-header">All Rooms</h1>

    <div>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary">Create a Room</a>
    </div>

    <hr>

    @foreach($rooms as $room)
        <h3>{{ $room->id }} - {{ $room->name }}</h3>
        <p>{{ $room->type }}</p>
        <p>
            <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-info">View</a>
            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary">Edit Room</a>
        </p>
        <hr>
    @endforeach

    <div>
        <a href="{{ route('rooms.create') }}" class="btn btn-primary">Create a Room</a>
    </div>
</div>
@stop
