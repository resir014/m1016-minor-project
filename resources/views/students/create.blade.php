@extends('app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/students') }}">Students</a></li>
    <li class="active">Create Student</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Create a New Student</h1>
    <p class="lead">Create a new Student master data.</p>
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
        'route' => 'students.store'
    ]) !!}

    @include('students.partials.form', ['buttonText' => 'Create New Student'])

    {!! Form::close() !!}
</div>
@endsection
