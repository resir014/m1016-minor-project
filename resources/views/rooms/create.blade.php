@extends('app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/rooms') }}">Rooms</a></li>
        <li class="active">Create Room</li>
    </ol>

    <h1>Create a New Room</h1>
    <p class="lead">Create a new Room master data.</p>
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

    @include('rooms.partials.form', ['buttonText' => 'Create New Room'])

    {!! Form::close() !!}
</div>
@stop
