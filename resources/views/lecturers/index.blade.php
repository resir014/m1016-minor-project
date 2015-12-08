@extends('app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li class="active">Lecturers</li>
    </ol>

    <h1 class="page-header">All Lecturers</h1>

    <div>
        <a href="{{ route('lecturers.create') }}" class="btn btn-primary">Add a lecturer</a>
    </div>

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

    <div>
        <a href="{{ route('lecturers.create') }}" class="btn btn-primary">Add a lecturer</a>
    </div>
</div>
@stop
