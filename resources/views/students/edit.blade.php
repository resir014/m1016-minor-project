@extends('app')

@section('title', 'Edit Student')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/students') }}">Students</a></li>
    <li class="active">Edit Student</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Edit Student</h1>
    <p class="lead">{{ $student->id }} - {{ $student->user->name }}</p>
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

    {!! Form::model($student, [
        'method' => 'PATCH',
        'route' => ['students.update', $student->id]
    ]) !!}

    @include('students.partials.form', ['buttonText' => 'Save'])

    {!! Form::close() !!}
</div>
@endsection
