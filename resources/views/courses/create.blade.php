@extends('app')

@section('title', 'Create Course')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/courses') }}">Courses</a></li>
    <li class="active">Create Course</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Create a New Course</h1>
    <p class="lead">Create a new Course master data.</p>
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
        'route' => 'courses.store'
    ]) !!}

    @include('courses.partials.form', ['buttonText' => 'Create New course'])

    {!! Form::close() !!}
</div>
@endsection
