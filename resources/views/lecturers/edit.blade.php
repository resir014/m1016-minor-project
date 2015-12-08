@extends('app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/lecturers') }}">Lecturers</a></li>
        <li class="active">Edit Lecturer</li>
    </ol>

    <h1>Edit Lecturer Details</h1>
    <p class="lead">{{ $lecturer->id }} - {{ $lecturer->user->name }}</p>
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

    {!! Form::model($lecturer, [
        'method' => 'PATCH',
        'route' => ['lecturers.update', $lecturer->id]
    ]) !!}

    @include('lecturers.partials.form', ['buttonText' => 'Create New Lecturer'])

    {!! Form::close() !!}
</div>
@stop
