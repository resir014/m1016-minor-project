@extends('app')

@section('content')
<div class="container">
    <h1>View Your Schedule Drafts</h1>
    <hr>

    @foreach($scheduleDrafts as $scheduleDraft)
        <h3>{{ $scheduleDraft->course_id }} - {{ $scheduleDraft->course->name }}</h3>
        <p>{{ $scheduleDraft->type }}</p>
        <p>
            <a href="{{ route('schedule-drafts.show', $scheduleDraft->id) }}" class="btn btn-info">View</a>
            <a href="{{ route('schedule-drafts.edit', $scheduleDraft->id) }}" class="btn btn-primary">Edit Room</a>
        </p>
        <hr>
    @endforeach

    <!--div class="pull-right"-->
        <a href="{{ route('schedule-drafts.create') }}" class="btn btn-primary">Create a Room</a>
    <!--/div-->
</div>
@stop
