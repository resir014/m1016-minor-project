@extends('app')

@section('title', 'Edit Student')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/students') }}">Students</a></li>
    <li><a href="{{ route('students.show', $student->id) }}">{{ $student->id }} - {{ $student->name }}</a></li>
    <li class="active">Edit Student</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Edit Student</h1>
    <p class="lead">{{ $student->id }} - {{ $student->name }}</p>
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

    <div class="form-group">
        {!! Form::label('id', 'Student ID', ['class' => 'control-label']) !!}
        <p class="form-control-static">{{ $student->id }}</p>
    </div>

    <div class="form-group">
        <div class="checkbox">
            <label>
                {!! Form::checkbox('active') !!}
                Active
            </label>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('admission_year', 'Admission Year', ['class' => 'control-label']) !!}
        {!! Form::text('admission_year', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('birth_date', 'Birth Date', ['class' => 'control-label']) !!}
        {!! Form::input('date', 'birth_date', $student->birth_date, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Verification Password', ['class' => 'control-label']) !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label']) !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
</div>
@endsection
