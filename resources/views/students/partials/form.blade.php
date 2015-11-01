<div class="form-group">
    {!! Form::label('nomor_induk', 'Nomor Induk', ['class' => 'control-label']) !!}
    {!! Form::text('nomor_induk', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Nama', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tahun_masuk', 'Tahun masuk', ['class' => 'control-label']) !!}
    {!! Form::text('tahun_masuk', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir', ['class' => 'control-label']) !!}
    {!! Form::input('date', 'tanggal_lahir', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($buttonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
