@extends('app')

@section('title', 'Edit My Profile')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/profile') }}">Profile</a></li>
    <li class="active">Edit Profile</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Edit My Profile</h1>
    <p class="lead">Edit your profile details below.</p>
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

    {!! Form::model($user, [
        'method' => 'PATCH',
        'route' => ['profile.update', $user->id]
    ]) !!}

    <h2>Profile Details</h2>

    <div class="form-group">
        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
        {!! Form::hidden('name', Auth::user()->name) !!}
        <p class="form-control-static">{{ Auth::user()->name }}</p>
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
        {!! Form::hidden('name', Auth::user()->email) !!}
        <p class="form-control-static">{{ Auth::user()->email }}</p>
    </div>

    <div class="form-group">
        {!! Form::label('password', 'New Password', ['class' => 'control-label']) !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirm New Password', ['class' => 'control-label']) !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>

    <hr>

    <h2>Verify Current Password</h2>

    <div class="form-group">
        {!! Form::label('old_password', 'Current Password', ['class' => 'control-label']) !!}
        {!! Form::password('old_password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
</div>
@endsection
