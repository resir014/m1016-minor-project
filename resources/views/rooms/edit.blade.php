@extends('app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/rooms') }}">Rooms</a></li>
        <li class="active">Edit Room</li>
    </ol>

    <h1>Edit Room Details</h1>
    <p class="lead">{{ $room->id }} - {{ $room->name }}</p>
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
</div>
@stop
