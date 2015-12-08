@extends('app')

@section('content')
<div class="container">
    <a href="{{ route('courses.index') }}">&larr; Go back to all courses</a>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <legend>Course</legend>
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">

                    <div class="form-group">
                        <label for="description" class="col-md-3 control-label">ID Matakuliah</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            <div class="radio radio-primary">
                                <label for="radio1">
                                    <input type="radio" name="radio1" id="radio1" value="option1" checked>
                                    Inactive
                                </label>
                            </div>
                            <div class="radio radio-primary">
                                <label for="radio2">
                                    <input type="radio" name="radio1" id="radio2" value="option2">
                                    Active
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-default btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
