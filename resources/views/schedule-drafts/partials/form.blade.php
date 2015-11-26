<div class="form-group">
    {!! Form::label('course_id', 'Course ID', ['class' => 'control-label']) !!}
    {!! Form::text('course_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('lecturer_id', 'Lecturer ID', ['class' => 'control-label']) !!}
    {!! Form::text('lectrer_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('room_id', 'Room Number', ['class' => 'control-label']) !!}
    {!! Form::text('room_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('date', 'Tanggal') !!}
    {!! Form::input('date', 'date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('shift', 'Shift') !!}
    {!! Form::select('shift', [1, 2, 3, 4], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($buttonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
