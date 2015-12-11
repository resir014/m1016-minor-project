@extends('app')

@section('title', 'Add Lecturer')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/lecturers') }}">Lecturers</a></li>
    <li class="active">Create Lecturer</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Create a New Lecturer</h1>
    <p class="lead">Create a new Lecturer master data.</p>
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

    {!! Form::open([
        'route' => 'lecturers.store'
    ]) !!}

    <div class="form-group" id="bloodhound-new-users">
        {!! Form::label('id', 'Nomor Induk', ['class' => 'control-label']) !!}
        {!! Form::text('id', null, ['class' => 'form-control typeahead']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('self_credit', 'Self Credit', ['class' => 'control-label']) !!}
        {!! Form::text('self_credit', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role', 'Role', ['class' => 'control-label']) !!}
        {!! Form::text('role', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('spesialisasi', 'Spesialisasi', ['class' => 'control-label']) !!}
        {!! Form::text('spesialisasi', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add Lecturer', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
</div>
@endsection
