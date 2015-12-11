<div class="form-group">
    {!! Form::label('id', 'Nomor Induk', ['class' => 'control-label']) !!}
    {!! Form::hidden('id', $lecturer->id) !!}
    <p class="form-control-static">{{ $lecturer->id }}</p>
</div>

<div class="form-group">
    {!! Form::label('name', 'Nama', ['class' => 'control-label']) !!}
    <p class="form-control-static">
        @if ($lecturer->user)
            {{ $lecturer->user->name }}
        @else
            N/A
        @endif
    </p>
</div>

<div class="form-group">
    {!! Form::label('self_credit', 'Self Credit', ['class' => 'control-label']) !!}
    {!! Form::text('self_credit', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('role', 'Role', ['class' => 'control-label']) !!}
    {!! Form::text('role', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('field', 'Field', ['class' => 'control-label']) !!}
    {!! Form::text('field', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($buttonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
