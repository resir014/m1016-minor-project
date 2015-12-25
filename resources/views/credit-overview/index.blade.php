@extends('app')

@section('breadcrumbs')
<ol class="breadcrumbs">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li><a href="{{ url('/schedule-drafts') }}">Schedule Drafts</a></li>
    <li class="active">Credit Overview</li>
</ol>
@endsection

@section('content')
<div class="container">
    <h1 class="page-header">Credit Overview</h1>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Lecturer</th>
                    <th>Self Credit</th>
                    <th>Course Credits</th>
                    <th>Total Credits</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>@{{ $lecturer->id }} - @{{ $lecturer->name }}</td>
                    <td>@{{ $lecturer->self_credit }}</td>
                    <td>@{{ $lecturer->course_credits }}</td>
                    <td>@{{ $lecturer->total_credits }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
