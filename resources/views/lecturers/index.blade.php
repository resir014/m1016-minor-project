@extends('app')

@section('content')
<div class="container">
    <h1>All Lecturers</h1>
    <hr>

    @foreach($lecturers as $lecturer)
        <h3>{{ $lecturer->id }} - @{{ $lecturer->user->name }}</h3>
        <p>Spesialisasi: {{ $lecturer->spesialisasi }}</p>
        <p>
            <a href="{{ route('lecturers.show', $lecturer->id) }}" class="btn btn-info">View</a>
            <a href="{{ route('lecturers.edit', $lecturer->id) }}" class="btn btn-primary">Edit lecturer</a>
        </p>
        <hr>
    @endforeach

    <!--div class="pull-right"-->
        <a href="{{ route('lecturers.create') }}" class="btn btn-primary">Add a lecturer</a>
    <!--/div-->
</div>
@stop
