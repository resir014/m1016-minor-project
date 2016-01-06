@extends('app')

@section('title', 'Update Schedule Draft')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/schedule-drafts') }}">Schedule Drafts</a></li>
    <li class="active">Update Schedule Draft</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Updating Schedule Draft</h1>
    <p class="lead">Draft ID: {{ $scheduleDraft->id }}</p>
    <hr>

<div class="row">

    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Lecturer</th>
                        <th>Course</th>
                        <th>Semester</th>
                        <th>Room</th>
                        <th>Day</th>
                        <th>Shift</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $scheduleDraft->lecturer->id }} - {{ $scheduleDraft->lecturer->user->name }}</td>
                        <td>{{ $scheduleDraft->course_id }} - {{ $scheduleDraft->course->name }}</td>
                        @if(!$scheduleDraft->semesters->isEmpty())
                            <td>{{ $scheduleDraft->semesters()->first()->name }}</td>
                        @else
                            <td>N/A</td>
                        @endif
                        <td>{{ $scheduleDraft->room->id }}</td>
                        <td>{{ $scheduleDraft->day }}</td>
                        <td>{{ $scheduleDraft->shift }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
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
@endsection
