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

@include('rooms.partials.form', ['buttonText' => 'Create New Room'])

{!! Form::close() !!}

@stop
