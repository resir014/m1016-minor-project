@extends('app')

@section('content')
<div class="container">
    <ul>
        <li>Data Type is {{ $type }} </li>
        <li>ID is {{ $user->userable->nomor_induk }}</li>
    </ul>
</div>
@stop
