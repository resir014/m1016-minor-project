@extends('app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/schedule-approvals') }}">Schrdule Approvals</a></li>
    <li class="active">Create Schedule Approval</li>
</ol>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Create Schedule Approval</h3>
                </div>
                <div class="panel-body">
                    {!! Form::open([
                        'route' => 'schedule-approvals.store'
                    ]) !!}
                    <div class="form-group" id="bloodhound-courses">
                        {!! Form::label('lecturer_id', 'Lecturer ID', ['class' => 'control-label']) !!}
                        {!! Form::hidden('lecturer_id', \Auth::user()->userable->id) !!}
                        <p class="form-control-static">{{ \Auth::user()->userable->id }}</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::label('day', 'Days Available', ['class' => 'control-label']) !!}
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('days[]', 'Monday') !!}
                                    Monday
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('days[]', 'Tuesday') !!}
                                    Tuesday
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('days[]', 'Wednesday') !!}
                                    Wednesday
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('days[]', 'Thursday') !!}
                                    Thursday
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('days[]', 'Friday') !!}
                                    Friday
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('days[]', 'Saturday') !!}
                                    Saturday
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('shift', 'Shifts Available', ['class' => 'control-label']) !!}
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('shifts[]', 1) !!}
                                    1
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('shifts[]', 2) !!}
                                    2
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('shifts[]', 3) !!}
                                    3
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('shifts[]', 4) !!}
                                    4
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12">
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
