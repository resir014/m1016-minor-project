@extends('app')

@section('title, Edit Room Details')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/rooms') }}">Rooms</a></li>
    <li class="active">Edit Room</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Edit Room Details</h1>
    <p class="lead">{{ $room->id }} - {{ $room->name }}</p>
    <hr>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($room, [
        'method' => 'PATCH',
        'route' => ['rooms.update', $room->id]
    ]) !!}

    @include('rooms.partials.form', ['buttonText' => 'Update Room'])

    {!! Form::close() !!}
</div>
@endsection
