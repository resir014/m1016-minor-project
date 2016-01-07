<div class="form-group">
    {!! Form::label('id', 'Student ID', ['class' => 'control-label']) !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <div class="checkbox">
        <label>
            {!! Form::checkbox('active', $student->active) !!}
            Active
        </label>
    </div>
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
    {!! Form::input('date', 'birth_date', $student->birth_date, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Verification Password', ['class' => 'control-label']) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label']) !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($buttonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
