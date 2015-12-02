<div class="form-group">
    {!! Form::label('course_id', 'Course ID', ['class' => 'control-label']) !!}
    {!! Form::text('course_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('lecturer_id', 'Lecturer ID', ['class' => 'control-label']) !!}
    {!! Form::text('lecturer_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('room_id', 'Room Number', ['class' => 'control-label']) !!}
    {!! Form::text('room_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('day', 'Hari') !!}
    {!! Form::select('day', ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('shift', 'Shift') !!}
    {!! Form::select('shift', [
        '1 (07:00-09:00)',
        '2 (09:00-11:00)',
        '3 (13:00-15:00)',
        '4 (15:00-17:00)'
    ], null, ['class' => 'form-control']) !!}
</div>
