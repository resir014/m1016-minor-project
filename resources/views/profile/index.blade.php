@extends('app')

@section('title', 'Profile')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li class="active">Profile</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1 class="page-header">Your Profile</h1>

    Name: {{ $user->name }}<br>
    Role: {{ $user->userable_type }}<br>
    ID: {{ $user->userable_id }}

    <hr>
    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Edit My Profile</a>
</div>
@endsection
