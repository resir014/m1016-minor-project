@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <legend>Pembahasan</legend>
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                    <div class="form-group">
                        <label for="id-matakuliah" class="col-md-3 control-label">ID Matakuliah</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="id-matakuliah" name="id-matakuliah">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="col-md-3 control-label">Keterangan</label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="7" id="keterangan" name="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-default btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
