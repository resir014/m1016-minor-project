@extends('app')

@section('content')
<div class="container">
    <h1>Create a Schedule Draft</h1>
    <hr>

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
