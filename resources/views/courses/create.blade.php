@extends('app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/courses') }}">Courses</a></li>
        <li class="active">Create Course</li>
    </ol>

    <h1>Create a New Course</h1>
    <p class="lead">Create a new Course master data.</p>
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
        'route' => 'courses.store'
    ]) !!}

    @include('courses.partials.form', ['buttonText' => 'Create New course'])

    {!! Form::close() !!}
</div>
@stop
