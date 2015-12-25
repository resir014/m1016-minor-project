@extends('app')

@section('title', 'Credit Overview')

@section('breadcrumbs')
<ol class="breadcrumb">
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
                @foreach($lecturers as $lecturer)
                    @unless(count($lecturer->scheduleDrafts) == 0)
                        <?php
                        $courseCredits = 0;

                        foreach ($lecturer->scheduleDrafts as $scheduleDraft) {
                            $courseCredits += $scheduleDraft->course->credits;
                        }
                        ?>
                        <?php $totalCredits = $lecturer->self_credit + $courseCredits; ?>
                        <tr>
                            <td>{{ $lecturer->id }}@if($lecturer->user) - {{ $lecturer->user->name }}@endif</td>
                            <td>{{ $lecturer->self_credit }}</td>
                            <td>{{ $courseCredits }}</td>
                            @if($totalCredits <= 15)
                            <td class="success">{{ $totalCredits }}</td>
                            @else
                            <td class="warning">{{ $totalCredits }}</td>
                            @endif
                        </tr>
                    @endunless
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
