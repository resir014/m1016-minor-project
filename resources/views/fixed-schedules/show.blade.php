@extends('app')

@section('title', 'View Fixed Schedule')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/fixed-schedules') }}">Fixed Schedules</a></li>
    <li class="active">Schedule ID: {{ $fixedSchedule->id }}</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Viewing Schedule</h1>
    <p class="lead">Schedule ID: {{ $fixedSchedule->id }}</p>
    <hr>

    <div class="row">
        <div class="col-md-8">
            <h2>Schedule Details</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Draft ID</th>
                            <th>Lecturer</th>
                            <th>Course</th>
                            <th>Room</th>
                            <th>Day</th>
                            <th>Shift</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $fixedSchedule->scheduleDraft->id }}</td>
                            <td>{{ $fixedSchedule->scheduleDraft->lecturer->id }} - {{ $fixedSchedule->scheduleDraft->lecturer->user->name }}</td>
                            <td>{{ $fixedSchedule->scheduleDraft->course->id }} - {{ $fixedSchedule->scheduleDraft->course->name }}</td>
                            <td>{{ $fixedSchedule->room_id }}</td>
                            <td>{{ $fixedSchedule->day }}</td>
                            <td>{{ $fixedSchedule->shift }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <h2>Students</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Student ID</th>
                            <th>Student Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>

    <a href="{{ route('fixed-schedules.index') }}" class="btn btn-info">Back to index</a>
    <a href="{{ route('fixed-schedules.edit', $fixedSchedule->id) }}" class="btn btn-primary">Update Schedule</a>
    <div class="pull-right">
        <button type="button" data-toggle="modal" data-target="#add-student" class="btn btn-default">Add Student</a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="add-student" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ $fixedSchedule->scheduleDraft->course->id }} - {{ $fixedSchedule->scheduleDraft->course->name }}</h4>
      </div>
      <div class="modal-body">
        @include('fixed-schedules.partials.add-student')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
