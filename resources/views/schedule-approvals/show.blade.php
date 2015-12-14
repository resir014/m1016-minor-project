@extends('app')

@section('title', 'View Schedule Draft')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/schedule-approvals') }}">Schedule Approvals</a></li>
    <li class="active">Approval ID: {{ $scheduleApproval->id }}</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Viewing Schedule Approval</h1>
    <p class="lead">Approval ID: {{ $scheduleApproval->id }}</p>
    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Lecturer</th>
                    <th>Days Available</th>
                    <th>Shifts Available</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $scheduleApproval->lecturer->id }} - {{ $scheduleApproval->lecturer->user->name }}</td>
                    <td>{{ $scheduleApproval->days }}</td>
                    <td>{{ $scheduleApproval->shifts }}</td>
                </tr>
            </tbody>
        </table>
    </div>


    <hr>

    <a href="{{ route('schedule-approvals.index') }}" class="btn btn-info">Back to index</a>

    <!--div class="pull-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['schedule-approvals.destroy', $scheduleApproval->id]
        ]) !!}
            {!! Form::submit('Delete this entry?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div-->
</div>
@endsection
