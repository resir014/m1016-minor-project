@extends('app')

@section('title', 'Home')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li class="active">Home</li>
</ol>
@endsection

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-3">
            @include('_sidebar')
            <hr class="hidden-md hidden-lg">
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>
                        Welcome, {{ Auth::user()->name }}!
                        @if (Auth::user()->userable_id)
                            ({{ Auth::user()->userable_id }})
                        @endif
                    </p>

                    @if (Auth::user()->userable)
                        <p class="text-info">
                            You are logged in as {{ Auth::user()->userable_type }}.
                        </p>
                    @else
                        <p class="text-danger">
                            Your role is not yet set. Please check with your admin.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
