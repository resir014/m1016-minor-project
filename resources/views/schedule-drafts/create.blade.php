@extends('app')

@section('title', 'Add Schedule Draft')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/schedule-drafts') }}">Schedule Drafts</a></li>
    <li class="active">Add Schedule Draft</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1 class="page-header">Add a Schedule Draft</h1>

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
        'route' => 'schedule-drafts.store'
    ]) !!}

    @include('schedule-drafts.partials.form')

    <hr>

    <div class="form-group">
        <div class="pull-right">
            {!! Form::submit('Add Schedule Draft', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>

    {!! Form::close() !!}
</div>
@endsection
