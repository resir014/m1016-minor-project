@extends('layouts.page')

@section('content')

<h1>Editing {{ $room->room_number }}</h1>
<p class="lead">Edit the Master Room data below, or <a href="{{ route('rooms.index') }}">go back to all rooms</a>.</p>
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

@include('rooms.partials.form', ['buttonText' => 'Update Room'])

{!! Form::close() !!}

@stop
