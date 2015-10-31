<div class="form-group">
    {!! Form::label('course_Code', 'Course Code', ['class' => 'control-label']) !!}
    {!! Form::text('course_Code', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('course_name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('course_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('credits', 'Credits', ['class' => 'control-label']) !!}
    {!! Form::text('credits', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($buttonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
