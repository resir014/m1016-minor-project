@extends('app')

@section('title', 'Publish Fixed Schedule')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/fixed-schedules') }}">Fixed Schedules</a></li>
    <li class="active">Publish Fixed Schedule</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1 class="page-header">Publish Fixed Schedule</h1>

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

    <p class="lead">Please confirm your changes before publishing this schedule.</p>

    {!! Form::model($scheduleDraft, [
        'route' => 'fixed-schedules.store'
    ]) !!}

    <table class="table">
        <thead>
            <tr>
                <th>Draft ID</th>
                <th>Course ID</th>
                <th>Lecturer ID</th>
                <th>Room ID</th>
                <th>Day</th>
                <th>Shift</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {!! Form::hidden('schedule_draft_id', $scheduleDraft->id) !!}
                    {{ $scheduleDraft->id }}
                </td>
                <td>
                    {{ $scheduleDraft->course->id }} - {{ $scheduleDraft->course->name }}
                </td>
                <td>
                    {{ $scheduleDraft->lecturer->id }} - {{ $scheduleDraft->lecturer->user->name }}
                </td>
                <td>
                    {!! Form::hidden('room_id', $scheduleDraft->room->id) !!}
                    {{ $scheduleDraft->room->id }}
                </td>
                <td>
                    {!! Form::hidden('day', $scheduleDraft->day) !!}
                    {{ $scheduleDraft->day }}
                </td>
                <td>
                    {!! Form::hidden('shift', $scheduleDraft->shift) !!}
                    {{ $scheduleDraft->shift }}
                </td>
            </tr>
        </tbody>
    </table>

    <hr>

    <div class="form-group">
        <a href="{{ url('/schedule-drafts', $scheduleDraft->id) }}" class="btn btn-default text-right">Back</a>
        <div class="pull-right">
            {!! Form::submit('Publish', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>

    {!! Form::close() !!}
</div>
@endsection
