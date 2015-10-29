<div class="form-group">
    {!! Form::label('room_number', 'Room Number', ['class' => 'control-label']) !!}
    {!! Form::text('room_number', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('room_name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('room_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('room_type', 'Type', ['class' => 'control-label']) !!}
    {!! Form::text('room_type', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('location', 'Location', ['class' => 'control-label']) !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($buttonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
