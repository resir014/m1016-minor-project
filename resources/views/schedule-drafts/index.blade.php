@extends('app')

@section('content')
<div class="container">
    <h1>Your Schedule Drafts</h1>
    <hr>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Update Schedule</h3>
        </div>
        <div class="panel-body">
            {!! Form::open() !!}
                <div class="form-group text-center">
                    {!! Form::label('id', 'Draft ID', ['class' => 'control-label']) !!}
                    {!! Form::text('id', null) !!}
                    <!--{!! Form::submit('Show', ['class' => 'btn btn-sm btn-primary']) !!}-->
                    <a href="#"></a>
                </div>
            {!! Form::close() !!}

        </div>
    </div>

    <hr>

    <div class="pull-right">
        <a href="{{ route('schedule-drafts.create') }}" class="btn btn-primary">Add New Schedule</a>
    </div>
</div>
@stop
