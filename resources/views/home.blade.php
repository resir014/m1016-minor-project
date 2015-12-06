@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    <p>
                        Welcome, {{ Auth::user()->name }}!
                        @if (Auth::user()->userable_id)
                            ({{ Auth::user()->userable->id }})
                        @endif
                    </p>

                    @if (Auth::user()->userable_id)
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
