@extends('app')

@section('content')
<div class="container">
    <h1>Updating Schedule Draft</h1>
    <p class="lead">Draft ID: {{ $scheduleDraft->id }}</p>
    <hr>

<div class="row">

    <div class="col-sm-12">

    <table class="table">
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Lecturer</th>
                <th>Room</th>
                <th>Day</th>
                <th>Shift</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $scheduleDraft->course->id }}</td>
                <td>{{ $scheduleDraft->lecturer->id }} - {{ $scheduleDraft->lecturer->user->name }}</td>
                <td>{{ $scheduleDraft->room->id }} ({{ $scheduleDraft->room->id }})</td>
                <td>{{ $scheduleDraft->day }}</td>
                <td>{{ $scheduleDraft->shift }}</td>
            </tr>
        </tbody>
    </table>
    </div>

    <div class="col-sm-10 col-sm-push-1">
        <div class="panel panel-default">
            <div class="panel-body">
                {!! Form::model($scheduleDraft, [
                    'method' => 'PATCH',
                    'route' => ['schedule-drafts.update', $scheduleDraft->id]
                ]) !!}

                @include('schedule-drafts.partials.form')

                <hr>

                <div class="form-group">
                    <a href="{{ route('schedule-drafts.show', $scheduleDraft->id) }}" class="btn btn-default">Back</a>
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
@stop
