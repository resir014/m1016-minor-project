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
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="day">Hari</label>
                                <div class="form-group">
                                    <input type="checkbox" name="day" value="Monday"> Monday
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="day" value="Tuesday"> Tuesday
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="day" value="Wenesday"> Wednesday
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="day" value="Thursday"> Thursday
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="day" value="Friday"> Friday
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="day" value="Saturday"> Saturday
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="day">Shift</label>
                            <div class="form-group">
                                <input type="checkbox" name="day" value="Monday"> 1
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="day" value="Tuesday"> 2
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="day" value="Wenesday"> 3
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="day" value="Thursday"> 4
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
