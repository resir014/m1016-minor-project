@extends('app')

@section('title', 'View Course Status')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/courses') }}">Courses</a></li>
    <li><a href="{{ url('/courses'.$course->id) }}">{{ $course->id }} - {{ $course->name }}</a></li>
    <li class="active">Status</li>
</ol>
@endsection

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Course Status</h3>
                </div>
                <div class="panel-body form-horizontal">
                    <div class="form-group">
                        <label for="description" class="col-md-3 control-label">Course ID</label>
                        <div class="col-md-9">
                            <p class="form-control-static">{{ $course->id }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            @if($course->active)
                                <p class="form-control-static text-success">Active</p>
                            @else
                                <p class="form-control-static text-danger">Inactive</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-default">
                                Back
                            </a>
                            <a href="{{ route('course-status.edit', $course->id) }}" class="btn btn-primary pull-right">Edit course status</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
