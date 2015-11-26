@extends('app')

@section('content')
<div class="container">
    <h1>Create a Schedule Draft</h1>
    <hr>

    {!! Form::open([
        'route' => 'schedule-drafts.store'
    ]) !!}

    @include('schedule-drafts.partials.form', ['buttonText' => 'Save'])

    {!! Form::close() !!}
</div>
@stop
