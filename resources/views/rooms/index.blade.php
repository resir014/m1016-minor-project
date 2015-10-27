@extends('layouts.page')

@section('content')

<h1>All Rooms</h1>
<hr>

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

@foreach($rooms as $room)
    <h3>{{ $room->room_id }}</h3>
    <p>{{ $room->room_type }}</p>
    <p>
        <a href="{{ route('rooms.show', $room->id) }}" class="btn btn-info">View</a>
        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary">Edit Room</a>
    </p>
    <hr>
@endforeach

<!--div class="pull-right"-->
    <a href="{{ route('rooms.create') }}" class="btn btn-primary">Create a Room</a>
<!--/div-->
@stop
