@extends('app')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <legend>Mr. Sosa:</legend>
        </div>

        <div class="col-sm-10">
            <h4>Kesedian Mengajar:</h4>
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">ID Dosen</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="amount" name="amount">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="status" name="status">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 text-right">
                            <button type="button" class="btn btn-default preview-add-button">
                                <span class="glyphicon glyphicon-plus"></span> Add
                            </button>
                            <button type="button" class="btn btn-default preview-add-button">
                                <span class="glyphicon glyphicon-plus"></span> Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>
@endsection
