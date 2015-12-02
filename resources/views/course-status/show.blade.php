@extends('app')

@section('content')
<div class="container">
    <a href="{{ route('courses.index') }}">&larr; Go back to all courses</a>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <legend>Course Status</legend>
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">

                    <div class="form-group">
                        <label for="description" class="col-md-3 control-label">ID Matakuliah</label>
                        <div class="col-md-9">
                            <span class="form-control">{{ $course->id }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            <span class="form-control">
                                @if($course->active)
                                    <span class="text-success">Active</span>
                                @else
                                    <span class="text-danger">Inactive</span>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{{ route('courses.index') }}" class="btn btn-default">
                                Back to all courses
                            </a>
                            <a href="{{ route('course-status.edit', $course->id) }}" class="btn btn-primary pull-right">Edit course status</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
