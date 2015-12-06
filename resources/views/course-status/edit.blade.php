@extends('app')

@section('content')
<div class="container">

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <legend>Course Status</legend>
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                    {!! Form::model($course, [
                        'method' => 'PATCH',
                        'route' => ['course-status.update', $course->id]
                    ]) !!}
                    <div class="form-group">
                        {!! Form::label('id', 'Course Code', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('id', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            <div class="radio radio-primary">
                                <label for="active">
                                    {!! Form::radio('active', 1) !!}
                                    Active
                                </label>
                            </div>
                            <div class="radio radio-primary">
                                <label for="active">
                                    {!! Form::radio('active', 0) !!}
                                    Inactive
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 pull-right">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
                            <a href="{{ route('courses.index') }}" class="btn btn-default">
                                Back to all courses
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop