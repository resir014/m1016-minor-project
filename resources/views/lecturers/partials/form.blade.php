<div class="form-group">
    {!! Form::label('nomor_induk', 'Nomor Induk', ['class' => 'control-label']) !!}
    {!! Form::text('nomor_induk', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Nama', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('beban_jabatan', 'Beban Jabatan', ['class' => 'control-label']) !!}
    {!! Form::text('beban_jabatan', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('jabatan', 'Jabatan', ['class' => 'control-label']) !!}
    {!! Form::text('jabatan', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('spesialisasi', 'Spesialisasi', ['class' => 'control-label']) !!}
    {!! Form::text('spesialisasi', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($buttonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
