@extends('app')

@section('content')
<div class="container">
    <a href="{{ route('students.index') }}">&larr; Go back to all students</a>

    <h1>Create a New Student</h1>
    <p class="lead">Create a new Student master data.</p>
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
        'route' => 'students.store'
    ]) !!}

    @include('students.partials.form', ['buttonText' => 'Create New Lecturer'])

    {!! Form::close() !!}
</div>
@stop
