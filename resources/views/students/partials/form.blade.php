<div class="form-group">
    {!! Form::label('id', 'Student ID', ['class' => 'control-label']) !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('admission_year', 'Admission Year', ['class' => 'control-label']) !!}
    {!! Form::text('admission_year', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('birth_date', 'Birth Date', ['class' => 'control-label']) !!}
    {!! Form::input('date', 'birth_date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($buttonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
