@extends('app')

@section('content')
<div class="container">
    <h1>Draft Jadwal</h1>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID Dosen</th>
                <th>Kode Matakuliah</th>
                <th>Kode Ruangan</th>
                <th>Tanggal</th>
                <th>Shift</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>No.</td>
                <td>ID Dosen</td>
                <td>Kode Matakuliah</td>
                <td>Kode Ruangan</td>
                <td>Tanggal</td>
                <td>Shift</td>
            </tr>
        </tbody>
    </table>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tambah" aria-controls="home" role="tab" data-toggle="tab">Tambah Jadwal</a></li>
        <li role="presentation"><a href="#revisi" aria-controls="profile" role="tab" data-toggle="tab">Revisi Jadwal</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="tambah">
            {!! Form::open() !!}
                    {!! Form::label('lecturer-id', 'Lecturer ID:') !!}
                    {!! Form::text('lecturer-id') !!}
                    {!! Form::submit('Show', ['class' => 'btn btn-sm btn-primary']) !!}
            {!! Form::close() !!}
            <span class="text-info">
                Nama Dosen, Nomor Induk Dosen, Jabatan, Spesialisasi, Beban SKS...
            </span>
            {!! Form::open() !!}
            <div class="form-group">
                {!! Form::label('lecturer-id', 'ID Matakuliah') !!}
                {!! Form::text('lecturer-id', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('lecturer-id', 'ID Ruangan') !!}
                {!! Form::text('lecturer-id', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('lecturer-id', 'Tanggal') !!}
                {!! Form::input('date', 'name', Carbon\Carbon::now(), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('test', 'Shift') !!}
                {!! Form::select('test', ['test', 'icle'], null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            </div>

            {!! Form::close() !!}
        </div>
        <div role="tabpanel" class="tab-pane" id="revisi">
            Revisi Jadwal
        </div>
    </div>

</div>
@stop
