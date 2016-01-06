@extends('app')

@section('title', 'Schedule Drafts')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li class="active">Schedule Drafts</li>
</ol>
@endsection

@section('content')
<div class="container">

    @if(Auth::user()->userable_type === 'Admin')
    <h1 class="page-header">All Schedule Drafts</h1>
    @else
    <h1 class="page-header">My Schedule Drafts</h1>
    @endif

    <p><strong>Note:</strong> Semester with <span class="text-success">green</span> text is current semester.</p>

    <hr>

    @if (Auth::user()->userable_type === 'Admin')
    <div>
        <a href="{{ route('schedule-drafts.create') }}" class="btn btn-primary">Add New Schedule</a>
        <a href="{{ route('credit-overview.index') }}" class="btn btn-default">Credit Overview</a>
    </div>
    @endif

    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Lecturer</th>
                    <th>Course</th>
                    <th>Credits</th>
                    <th>Semester</th>
                    <th>Class</th>
                    <th>Room</th>
                    <th>Day</th>
                    <th>Shift</th>
                    @if(Auth::user()->userable_type === 'Admin')
                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($scheduleDrafts as $scheduleDraft)
                <tr>
                    <td>{{ $scheduleDraft->lecturer->id }} - {{ $scheduleDraft->lecturer->user->name }}</td>
                    <td>{{ $scheduleDraft->course_id }} - {{ $scheduleDraft->course->name }}</td>
                    <td>{{ $scheduleDraft->course->credits }}</td>
                    @unless($scheduleDraft->semesters->isEmpty())
                        @if($scheduleDraft->semesters()->first()->current)
                        <td>
                            <span class="text-success">{{ $scheduleDraft->semesters()->first()->name }}</span>
                        </td>
                        @else
                        <td>{{ $scheduleDraft->semesters()->first()->name }}</td>
                        @endif
                    @endunless
                    <td>{{ $scheduleDraft->class_id }}</td>
                    <td>{{ $scheduleDraft->room->id }}</td>
                    <td>{{ $scheduleDraft->day }}</td>
                    <td>{{ $scheduleDraft->shift }}</td>
                    @if(Auth::user()->userable_type === 'Admin')
                    <td><a href="{{ route('schedule-drafts.show', $scheduleDraft->id) }}">View</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>

    @if (Auth::user()->userable_type === 'Admin')
    <div>
        <a href="{{ route('schedule-drafts.create') }}" class="btn btn-primary">Add New Schedule</a>
        <a href="{{ route('credit-overview.index') }}" class="btn btn-default">Credit Overview</a>
    </div>
    @endif
</div>
@endsection
