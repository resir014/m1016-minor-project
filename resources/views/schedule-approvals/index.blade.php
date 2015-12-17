@extends('app')

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}">Home</a></li>
    <li class="active">Schedule Approvals</li>
</ol>
@endsection

@section('content')
<div class="container">

    <h1 class="page-header">Schedule Approvals</h1>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Lecturer</th>
                    <th>Semester</th>
                    <th>Shifts Available</th>
                    @if(Auth::user()->userable_type === 'Admin')
                    <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($scheduleApprovals as $scheduleApproval)
                <tr>
                    <td>{{ $scheduleApproval->lecturer->id }} - {{ $scheduleApproval->lecturer->user->name }}</td>
                    <td>{{ $scheduleApproval->semester }}</td>
                    <td>{{ $scheduleApproval->shifts_available }}</td>
                    @if(Auth::user()->userable_type === 'Admin')
                    <td><a href="{{ route('schedule-approvals.show', $scheduleApproval->id) }}">View</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>
</div>
@endsection
