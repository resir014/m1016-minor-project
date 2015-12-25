@extends('app')

@section('title', 'Add Student')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/students') }}">Students</a></li>
    <li class="active">Add Student</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1 class="page-header">Add a New Student</h1>

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

    {!! Form::open([
        'route' => 'students.store'
    ]) !!}

    @include('students.partials.form', ['buttonText' => 'Save'])

    {!! Form::close() !!}
</div>
@endsection
