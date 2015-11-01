@extends('app')

@section('content')
<div class="container">
    <h1>Editing {{ $lecturer->nomor_induk }}</h1>
    <p class="lead">Edit the Lecturer master data below, or <a href="{{ route('lecturers.index') }}">go back to all lecturers</a>.</p>
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
