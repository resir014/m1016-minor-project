@extends('app')

@section('title', 'Update Fixed Schedule')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/fixed-schedules') }}">Fixed Schedules</a></li>
    <li class="active">Update Fixed Schedule</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Updating Schedule</h1>
    <p class="lead">Schedule ID: {{ $fixedSchedule->id }}</p>
    <hr>

<div class="row">

    <div class="col-sm-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Draft ID</th>
                    <th>Lecturer</th>
                    <th>Course</th>
                    <th>Room</th>
                    <th>Day</th>
                    <th>Shift</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $fixedSchedule->scheduleDraft->id }}</td>
                    <td>{{ $fixedSchedule->scheduleDraft->lecturer->id }} - {{ $fixedSchedule->scheduleDraft->lecturer->user->name }}</td>
                    <td>{{ $fixedSchedule->scheduleDraft->course->id }} - {{ $fixedSchedule->scheduleDraft->course->name }}</td>
                    <td>{{ $fixedSchedule->scheduleDraft->room->id }}</td>
                    <td>{{ $fixedSchedule->day }}</td>
                    <td>{{ $fixedSchedule->shift }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-sm-10 col-sm-push-1">
        <div class="panel panel-default">
            <div class="panel-body">
                {!! Form::model($fixedSchedule, [
                    'method' => 'PATCH',
                    'route' => ['fixed-schedules.update', $fixedSchedule->id]
                ]) !!}

                @include('fixed-schedules.partials.form')

                <hr>

                <div class="form-group">
                    <a href="{{ route('fixed-schedules.show', $fixedSchedule->id) }}" class="btn btn-default">Back</a>
                    <div class="pull-right">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
