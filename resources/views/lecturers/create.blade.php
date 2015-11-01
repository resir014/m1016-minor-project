@extends('app')

@section('content')
<div class="container">
    <a href="{{ route('lecturers.index') }}">&larr; Go back to all lecturers</a>

    <h1>Create a New Lecturer</h1>
    <p class="lead">Create a new Lecturer master data.</p>
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
        'route' => 'lecturers.store'
    ]) !!}

    @include('lecturers.partials.form', ['buttonText' => 'Create New Lecturer'])

    {!! Form::close() !!}
</div>
@stop
