@extends('app')

@section('content')
<div class="container">
    <h1>{{ $scheduleDraft->course->code }} - {{ $scheduleDraft->course->name }}</h1>
    <p class="lead">CID: {{ $scheduleDraft->course->id }}</p>
    <hr>

    <p>
        Lecturer: {{ $scheduleDraft->lecturer->nomor_induk }} - {{ $scheduleDraft->lecturer->user->name }}<br>
        Room: {{ $scheduleDraft->room->number }}<br>
        Day: {{ $scheduleDraft->day }}<br/>
        Shift: {{ $scheduleDraft->shift }}
    </p>

    <a href="{{ route('schedule-drafts.index') }}" class="btn btn-info">Back to index</a>
    <a href="{{ route('schedule-drafts.edit', $scheduleDraft->id) }}" class="btn btn-primary">Make revision</a>

    <div class="pull-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['schedule-drafts.destroy', $scheduleDraft->id]
        ]) !!}
            {!! Form::submit('Delete this draft?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
