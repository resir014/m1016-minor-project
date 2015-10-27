@extends('layouts.page')

@section('content')

<a href="{{ route('rooms.index') }}">&larr; Go back to all rooms</a>

<h1>Create a New Room</h1>
<p class="lead">Create a new Master Room data.</p>
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

{!! Form::open([
    'route' => 'rooms.store'
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

{!! Form::submit('Create New Room', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop
