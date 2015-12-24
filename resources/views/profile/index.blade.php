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

    <p class="lead">
        Welcome, {{ Auth::user()->name }}!
        @if (Auth::user()->userable_id)
            Your ID is {{ Auth::user()->userable_id }}.
        @endif
    </p>

    @if (Auth::user()->userable)
        <p class="text-info">
            You are logged in as {{ Auth::user()->userable_type }}.
        </p>
    @else
        <p class="text-danger">
            Your role is not yet set. Please check with your admin.
        </p>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    @if (Auth::user()->userable_type == 'Admin')
                    <th>Role</th>
                    @elseif (Auth::user()->userable_type == 'Lecturer')
                    <th>Role</th>
                    <th>Field</th>
                    <th>Self Credit</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->userable_id }}</td>
                    <td>{{ $user->name }}</td>
                    @if (Auth::user()->userable_type == 'Admin')
                    <td>{{ $user->userable->role }}</td>
                    @elseif (Auth::user()->userable_type == 'Lecturer')
                    <td>{{ $user->userable->role }}</td>
                    <td>{{ $user->userable->field }}</td>
                    <td>{{ $user->userable->self_credit }}</td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>

    <hr>
    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Edit My Profile</a>
</div>
@endsection
