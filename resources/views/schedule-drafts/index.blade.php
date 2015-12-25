@extends('app')

@section('title', 'Schedule Drafts')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li class="active">Schedule Drafts</li>
</ol>
@endsection

@section('content')
<div class="container">

    @if(Auth::user()->userable_type === 'Admin')
    <h1 class="page-header">All Schedule Drafts</h1>
    @else
    <h1 class="page-header">My Schedule Drafts</h1>
    @endif

    @if (Auth::user()->userable_type === 'Admin')
    <div>
        <a href="{{ route('schedule-drafts.create') }}" class="btn btn-primary">Add New Schedule</a>
    </div>
    @endif

    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Draft ID</th>
                    <th>Lecturer</th>
                    <th>Course</th>
                    <th>Credits</th>
                    <th>Room</th>
                    <th>Day</th>
                    <th>Shift</th>
                    @if(Auth::user()->userable_type === 'Admin')
                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($scheduleDrafts as $scheduleDraft)
                <tr>
                    <td>{{ $scheduleDraft->id }}</td>
                    <td>{{ $scheduleDraft->lecturer->id }} - {{ $scheduleDraft->lecturer->user->name }}</td>
                    <td>{{ $scheduleDraft->course_id }} - {{ $scheduleDraft->course->name }}</td>
                    <td>{{ $scheduleDraft->course->credits }}</td>
                    <td>{{ $scheduleDraft->room->id }}</td>
                    <td>{{ $scheduleDraft->day }}</td>
                    <td>{{ $scheduleDraft->shift }}</td>
                    @if(Auth::user()->userable_type === 'Admin')
                    <td><a href="{{ route('schedule-drafts.show', $scheduleDraft->id) }}">View</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>

    @if (Auth::user()->userable_type === 'Admin')
    <div>
        <a href="{{ route('schedule-drafts.create') }}" class="btn btn-primary">Add New Schedule</a>
        <a href="{{ route('credit-overview.index') }}" class="btn btn-default">Credit Overview</a>
    </div>
    @endif
</div>
@endsection
