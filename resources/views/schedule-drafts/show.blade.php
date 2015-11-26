@extends('app')

@section('content')
<h1>{{ $scheduleDraft->course_id }} - {{ $scheduleDraft->course->name }}</h1>
<p class="lead">Added by: {{ $scheduleDraft->lecturer->name }}</p>
<hr>

<p>
    Type: {{ $scheduleDraft->type }}<br/>
    Date: {{ $scheduleDraft->date }}<br/>
    Shift: {{ $scheduleDraft->shift }}
</p>

<a href="{{ route('rooms.index') }}" class="btn btn-info">Back to all rooms</a>
<a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary">Edit Room</a>

<div class="pull-right">
    {!! Form::open([
        'method' => 'DELETE',
        'route' => ['rooms.destroy', $room->id]
    ]) !!}
        {!! Form::submit('Delete this room?', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
</div>
@stop
