@extends('app')

@section('content')
<div class="container">
    <h1>All Rooms</h1>
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

    <!--div class="pull-right"-->
        <a href="{{ route('rooms.create') }}" class="btn btn-primary">Create a Room</a>
    <!--/div-->
</div>
@stop
