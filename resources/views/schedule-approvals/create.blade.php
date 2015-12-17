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
                    <div class="form-group">
                        {!! Form::label('lecturer_id', 'Lecturer ID', ['class' => 'control-label']) !!}
                        {!! Form::hidden('lecturer_id', \Auth::user()->userable->id) !!}
                        <p class="form-control-static">{{ \Auth::user()->userable->id }}</p>
                    </div>
                    <div class="form-group">
                        {!! Form::label('semester', 'Semester', ['class' => 'control-label']) !!}
                        {!! Form::select('semester', [
                            '2015 - Odd' => '2015 - Odd',
                            '2015 - Even' => '2015 - Even',
                            '2016 - Odd' => '2016 - Odd',
                            '2016 - Even' => '2016 - Even'
                        ], null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Shift 1</th>
                                            <th>Shift 2</th>
                                            <th>Shift 3</th>
                                            <th>Shift 4</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Monday</strong></td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'MO1') !!}
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'MO2') !!}
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'MO3') !!}
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'MO4') !!}
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tuesday</strong></td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'TU1') !!}
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'TU2') !!}
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'TU3') !!}
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'TU4') !!}
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Wednesday</strong></td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'WE1') !!}
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'WE2') !!}
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'WE3') !!}
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'WE4') !!}
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Thursday</strong></td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'TH1') !!}
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'TH2') !!}
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'TH3') !!}
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'TH4') !!}
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Friday</strong></td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'FR1') !!}
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'FR2') !!}
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'FR3') !!}
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    {!! Form::checkbox('shifts_available[]', 'FR4') !!}
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
