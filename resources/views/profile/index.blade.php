@extends('app')

@section('content')
<div class="container">
    <h1>Your Profile</h1>
    <hr>

    Name: {{ $user->name }}<br>
    UserType: {{ $user->userable_type }}

    <hr>
    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Edit My Profile</a>
</div>
@stop
