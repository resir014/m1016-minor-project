@extends('app')

@section('title', 'Create Lecturer')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/lecturers') }}">Lecturers</a></li>
    <li class="active">Create Lecturer</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Create a New Lecturer</h1>
    <p class="lead">Create a new Lecturer master data.</p>
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

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    {!! Form::open([
        'route' => 'lecturers.store'
    ]) !!}

    @include('lecturers.partials.form', ['buttonText' => 'Create New Lecturer'])

    {!! Form::close() !!}
</div>
@endsection
