@extends('app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li class="active">Attendance</li>
</ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <h1 class="page-header">Attendance Form</h1>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Schedule ID</th>
                            <th>Course</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->id }}</td>
                            <td>{{ $schedule->scheduleDraft->course->id }} - {{ $schedule->scheduleDraft->course->name }}</td>
                            <td><a href="{{ url('/attendance-form/create') }}">Post Attendance</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
