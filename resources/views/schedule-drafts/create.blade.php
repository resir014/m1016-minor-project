@extends('app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/schedule-drafts') }}">Schedule Drafts</a></li>
        <li class="active">Create Schedule Draft</li>
    </ol>

    <h1 class="page-header">Create a Schedule Draft</h1>

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

    {!! Form::open([
        'route' => 'schedule-drafts.store'
    ]) !!}

    @include('schedule-drafts.partials.form')

    <hr>

    <div class="form-group">
        <div class="pull-right">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>

    {!! Form::close() !!}
</div>
@stop
