@extends('layouts.master')

@section('content')
@include('includes.navbar')

<div class="container">
    @yield('content')
</div>
@endsection
