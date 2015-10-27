@extends('layouts.page')

@section('content')

<h1>Editing "{{ $room->room_id }}"</h1>
<p class="lead">Edit the Master Room data below, or <a href="{{ route('rooms.index') }}">go back to all rooms.</a></p>
<hr>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

{!! Form::model($room, [
    'method' => 'PATCH',
    'route' => ['rooms.update', $room->id]
]) !!}

<div class="form-group">
    {!! Form::label('room_id', 'Room ID', ['class' => 'control-label']) !!}
    {!! Form::text('room_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('room_name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('room_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('room_type', 'Type', ['class' => 'control-label']) !!}
    {!! Form::text('room_type', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('location', 'Location', ['class' => 'control-label']) !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Update Room', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop
