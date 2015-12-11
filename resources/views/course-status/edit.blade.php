@extends('app')

@section('title', 'Edit Course Status')

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

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Course Status</h3>
                </div>
                <div class="panel-body">
                    {!! Form::model($course, [
                        'method' => 'PATCH',
                        'route' => ['course-status.update', $course->id],
                        'class' => 'form-horizontal'
                    ]) !!}
                    <div class="form-group">
                        {!! Form::label('id', 'Course ID', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::hidden('id', null) !!}
                            <p class="form-control-static">{{ $course->id }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            <div class="radio">
                                <label for="active">
                                    {!! Form::radio('active', 1) !!}
                                    Active
                                </label>
                            </div>
                            <div class="radio">
                                <label for="active">
                                    {!! Form::radio('active', 0) !!}
                                    Inactive
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-default">
                                Back
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
