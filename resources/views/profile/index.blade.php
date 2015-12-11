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
            Your user ID is {{ Auth::user()->userable_id }}.
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

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                @if (Auth::user()->userable_type == 'Admin')
                <th>Role</th>
                @elseif (Auth::user()->userable_type == 'Lecturer')
                <th>Self Credit</th>
                <th>Role</th>
                <th>Field</th>
                @elseif (Auth::user()->userable_type == 'Student')
                <th>Tanggal Lahir</th>
                <th>Tahun Masuk</th>
                <th>Nilai Tugas</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Sumatif</th>
                @endif
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->userable_id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->userable_type }}</td>
                @if (Auth::user()->userable_type == 'Admin')
                <td>{{ $user->userable->role }}</td>
                @elseif (Auth::user()->userable_type == 'Lecturer')
                <td>{{ $user->userable->self_credit }}</td>
                <td>{{ $user->userable->role }}</td>
                <td>{{ $user->userable->field }}</td>
                @elseif (Auth::user()->userable_type == 'Student')
                <td>{{ $user->userable->birth_date }}</td>
                <td>{{ $user->userable->admission_year }}</td>
                <td>{{ $user->userable->nilai_tugas }}</td>
                <td>{{ $user->userable->nilai_uts }}</td>
                <td>{{ $user->userable->nilai_uas }}</td>
                <td>{{ $user->userable->nilai_sumatif }}</td>
                @endif
            </tr>
        </tbody>
    </table>

    <hr>
    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Edit My Profile</a>
</div>
@endsection
