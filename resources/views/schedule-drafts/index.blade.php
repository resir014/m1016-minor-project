@extends('app')

@section('content')
<div class="container">
    @if(Auth::user()->userable_type === 'Admin')
    <h1>View Schedule Drafts</h1>
    @else
    <h1>Your Schedule Drafts</h1>
    @endif
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>Draft ID</th>
                <th>Lecturer</th>
                <th>Course</th>
                <th>Room</th>
                <th>Day</th>
                <th>Shift</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($scheduleDrafts as $scheduleDraft)
            <tr>
                <td>{{ $scheduleDraft->id }}</td>
                <td>{{ $scheduleDraft->lecturer->id }} - {{ $scheduleDraft->lecturer->user->name }}</td>
                <td>{{ $scheduleDraft->course->id }} - {{ $scheduleDraft->course->name }}</td>
                <td>{{ $scheduleDraft->room->id }}</td>
                <td>{{ $scheduleDraft->day }}</td>
                <td>{{ $scheduleDraft->shift }}</td>
                <td><a href="{{ route('schedule-drafts.show', $scheduleDraft->id) }}">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <div class="pull-right">
        <a href="{{ route('schedule-drafts.create') }}" class="btn btn-primary">Add New Schedule</a>
    </div>
</div>
@stop
