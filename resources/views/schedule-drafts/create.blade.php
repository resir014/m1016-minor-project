@extends('app')

@section('content')
<div class="container">
    <h1>Create a Schedule Draft</h1>
    <hr>

    {!! Form::open([
        'route' => 'schedule-drafts.store'
    ]) !!}

    @include('schedule-drafts.partials.form')

    <hr>

    <div class="form-group">
        <div class="pull-right">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>

    {!! Form::close() !!}
</div>
@stop
