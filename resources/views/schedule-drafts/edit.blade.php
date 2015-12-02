@extends('app')

@section('content')
<div class="container">
    <h1>Edit Schedule Draft</h1>
    <hr>

    {!! Form::model($room, [
        'method' => 'PATCH',
        'route' => ['schedule-drafts.update', $scheduleDraft->id]
    ]) !!}

    @include('schedule-drafts.partials.form', ['buttonText' => 'Save'])

    {!! Form::close() !!}
</div>
@stop
