@extends('app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li class="active">Schedule Approvals</li>
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
                    {!! Form::open() !!}
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
                                    {!! Form::checkbox('day', 'Monday') !!}
                                    Monday
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('day', 'Tuesday') !!}
                                    Tuesday
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('day', 'Wednesday') !!}
                                    Wednesday
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('day', 'Thursday') !!}
                                    Thursday
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('day', 'Friday') !!}
                                    Friday
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('day', 'Saturday') !!}
                                    Saturday
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('shift', 'Shifts Available', ['class' => 'control-label']) !!}
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('shift', 1) !!}
                                    1
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('shift', 2) !!}
                                    2
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('shift', 3) !!}
                                    3
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('shift', 4) !!}
                                    4
                                </label>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
