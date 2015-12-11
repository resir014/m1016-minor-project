@extends('app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/session-log') }}">Session Logs</a></li>
    <li class="active">Create Session Log</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1>Session Log</h1>
    <p class="lead">Schedule ID: @{{ $fixedSchedule->id }}</p>
    <hr>

    <h2>Course Details</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Schedule ID</th>
                <th>Course</th>
                <th>Lecturer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>@{{ $schedule->id }}</td>
                <td>@{{ $course->id }}</td>
                <td>@{{ $lecturer->id }} - @{{ $lecturer->name }}</td>
            </tr>
        </tbody>
    </table>

    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="" action="index.html" method="post">
                    <div class="form-group">
                        <div class="form-group" id="bloodhound-courses">
                            {!! Form::label('details', 'Details', ['class' => 'control-label']) !!}
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verify">
                            Submit
                        </button>
                    </div>
                    <button type="button" name="button" class="btn btn-default">Back</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="verify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Session Log Verification</h4>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-sm-12">
                  <form class="form-horizontal" action="" method="post">
                      <div class="form-group">
                          <label for="student_id">Student ID</label>
                          <input type="password" class="form-control" id="student_id" placeholder="Student ID">
                      </div>
                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" id="password" placeholder="Password">
                      </div>
                      <div class="form-group">
                          <div class="checkbox">
                              <label>
                                  <input type="checkbox"> I agree that the information entered were correct.
                              </label>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
@endsection
