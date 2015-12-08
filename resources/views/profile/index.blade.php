@extends('app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li class="active">Profile</li>
    </ol>

    <h1 class="page-header">Your Profile</h1>

    Name: {{ $user->name }}<br>
    Role: {{ $user->userable_type }}<br>
    ID: {{ $user->userable_id }}

    <hr>
    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Edit My Profile</a>
</div>
@stop
