@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {{ Form::open(['action' => ['SearchController@searchUser'], 'method' => 'GET']) }}
                {{ Form::text('q', '', ['id' =>  'q', 'class' => 'form-control', 'placeholder' =>  'Enter name'])}}
                {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
