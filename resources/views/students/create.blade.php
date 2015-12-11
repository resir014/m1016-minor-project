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

    <div class="form-group" id="bloodhound-new-users">
        {!! Form::label('id', 'Student ID', ['class' => 'control-label']) !!}
        {!! Form::text('id', null, ['class' => 'form-control typeahead']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('admission_year', 'Admission Year', ['class' => 'control-label']) !!}
        {!! Form::text('admission_year', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('birth_date', 'Birth Date', ['class' => 'control-label']) !!}
        {!! Form::input('date', 'birth_date', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add Student', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
</div>
@endsection
