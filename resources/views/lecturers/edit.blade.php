@extends('app')

@section('title', 'Edit Lecturer')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/lecturers') }}">Lecturers</a></li>
    <li class="active">Edit Lecturer</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Edit Lecturer Details</h1>
    <p class="lead">{{ $lecturer->id }} - {{ $lecturer->user->name }}</p>
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

    {!! Form::model($lecturer, [
        'method' => 'PATCH',
        'route' => ['lecturers.update', $lecturer->id]
    ]) !!}

    @include('lecturers.partials.form', ['buttonText' => 'Save'])

    {!! Form::close() !!}
</div>
@endsection
