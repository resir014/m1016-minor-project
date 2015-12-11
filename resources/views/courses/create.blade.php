@extends('app')

@section('title', 'Create Course')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/courses') }}">Courses</a></li>
    <li class="active">Add Course</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1 class="page-header">Add a New Course</h1>

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

    {!! Form::open([
        'route' => 'courses.store'
    ]) !!}

    @include('courses.partials.form', ['buttonText' => 'Add Course'])

    {!! Form::close() !!}
</div>
@endsection
