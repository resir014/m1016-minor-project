@extends('app')

@section('title', 'Create Session Log')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ route('fixed-schedules.index') }}">Fixed Schedules</a></li>
    <li>
        <a href="{{ route('fixed-schedules.show', $schedule->id) }}">
            Schedule ID: {{ $schedule->id }}
        </a>
    </li>
    <li><a href="{{ route('fixed-schedules.session-log.index', $schedule->id) }}">Session Logs</a></li>
    <li class="active">Create Session Log</li>
</ol>
@endsection

@section('content')
{!! Form::open([
    'route' => ['fixed-schedules.session-log.store', $schedule->id]
]) !!}

{!! Form::hidden('attendance_form_id', $attendance->id) !!}

<div class="container">

    <h1>Session Log</h1>
    <p class="lead">Schedule ID: {{ $schedule->id }} | Attendance ID: {{ $attendance->id }}</p>
    <hr>

    <h2>Course Details</h2>

    <div class="table-responsive">
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
                    <td>
                        {!! Form::hidden('fixed_schedule_id', $schedule->id) !!}
                        {{ $schedule->id }}
                    </td>
                    <td>
                        {!! Form::hidden('course_id', $schedule->course_id) !!}
                        {{ $schedule->course_id }}
                    </td>
                    <td>
                        {!! Form::hidden('lecturer_id', $schedule->scheduleDraft->lecturer->id) !!}
                        {{ $schedule->scheduleDraft->lecturer->id }} - {{ $schedule->scheduleDraft->lecturer->user->name }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <h2>Student List</h2>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Present</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedule->students as $i => $student)
                <?php $checked = in_array($student->id, $checkeds) ? true : false; ?>
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{!! Form::checkbox('student_list[]', $student->id, $checked) !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <div class="form-group" id="bloodhound-courses">
                        {!! Form::label('remarks', 'Remarks', ['class' => 'control-label']) !!}
                        <textarea class="form-control" name="remarks" rows="5"></textarea>
                    </div>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verify">
                        Submit
                    </button>
                </div>
                <a href="{{ route('fixed-schedules.session-log.index') }}" class="btn btn-default">Back</a>
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
                      <div class="form-group" id="bloodhound-students">
                          {!! Form::label('student_id', 'Student ID', ['class' => 'control-label']) !!}
                          {!! Form::text('student_id', null, ['class' => 'form-control typeahead']) !!}
                      </div>
                      <div class="form-group">
                          {!! Form::label('student_password', 'Password', ['class' => 'control-label']) !!}
                          {!! Form::password('student_password', ['class' => 'form-control']) !!}
                      </div>
                      <div class="form-group">
                          <div class="checkbox">
                              <label>
                                  <input type="checkbox" name="agreement"> I agree that the information entered were correct.
                              </label>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}
@endsection
