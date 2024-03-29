@extends('app')

@section('title', 'All Lecturers')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li class="active">Lecturers</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1 class="page-header">All Lecturers</h1>

    <div>
        <a href="{{ route('lecturers.create') }}" class="btn btn-primary">Add Lecturer</a>
    </div>

    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Field</th>
                    <th>Self Credit</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($lecturers as $lecturer)
                <tr>
                    <td>{{ $lecturer->id }}</td>
                    <td>@if($lecturer->user) {{ $lecturer->user->name }} @else N/A @endif</td>
                    <td>{{ $lecturer->role }}</td>
                    <td>{{ $lecturer->field }}</td>
                    <td>{{ $lecturer->self_credit }}</td>
                    <td><a href="{{ route('lecturers.show', $lecturer->id) }}">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        <a href="{{ route('lecturers.create') }}" class="btn btn-primary">Add Lecturer</a>
    </div>
</div>
@endsection
