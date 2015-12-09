@extends('app')

@section('title', 'Create Student')

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

    <div class="form-group" id="bloodhound-new-users">
        {!! Form::label('id', 'Nomor Induk', ['class' => 'control-label']) !!}
        {!! Form::text('id', null, ['class' => 'form-control typeahead']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('admission_year', 'Tahun masuk', ['class' => 'control-label']) !!}
        {!! Form::text('admission_year', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('birth_date', 'Tanggal Lahir', ['class' => 'control-label']) !!}
        {!! Form::input('date', 'birth_date', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add New Student', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
</div>
@endsection
