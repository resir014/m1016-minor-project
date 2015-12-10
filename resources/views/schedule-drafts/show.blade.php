@extends('app')

@section('title', 'View Schedule Draft')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/schedule-drafts') }}">Schedule Drafts</a></li>
    <li class="active">Draft ID: {{ $scheduleDraft->id }}</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Viewing Schedule Draft</h1>
    <p class="lead">Draft ID: {{ $scheduleDraft->id }}</p>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>Lecturer</th>
                <th>Course</th>
                <th>Room</th>
                <th>Day</th>
                <th>Shift</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $scheduleDraft->lecturer->id }} - {{ $scheduleDraft->lecturer->user->name }}</td>
                <td>{{ $scheduleDraft->course->id }} - {{ $scheduleDraft->course->name }}</td>
                <td>{{ $scheduleDraft->room->id }}</td>
                <td>{{ $scheduleDraft->day }}</td>
                <td>{{ $scheduleDraft->shift }}</td>
            </tr>
        </tbody>
    </table>


    <hr>

    <a href="{{ route('schedule-drafts.index') }}" class="btn btn-info">Back to index</a>
    <a href="{{ route('schedule-drafts.edit', $scheduleDraft->id) }}" class="btn btn-primary">Make revision</a>
    <a href="{{ url('/fixed-schedules/create', $scheduleDraft->id) }}" class="btn btn-default text-right">Publish Schedule</a>

    <div class="pull-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['schedule-drafts.destroy', $scheduleDraft->id]
        ]) !!}
            {!! Form::submit('Delete this draft?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection
