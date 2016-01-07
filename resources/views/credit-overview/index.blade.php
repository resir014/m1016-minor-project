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
    <h1>Credit Overview</h1>
    <p class="lead">Current semester: {{ \App\Semester::where('current', 1)->first()->name }}</p>
    <hr>

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
                    <?php
                    // Initial Course Credits value.
                    $courseCredits = 0;

                    foreach ($lecturer->scheduleDrafts->sortByDesc('class_id') as $i => $scheduleDraft) {
                        // This will only trigger if an entry is present before the last one.
                        if (isset($lecturer->scheduleDrafts->sortByDesc('class_id')[$i-1])) {
                            $prev = $lecturer->scheduleDrafts->sortByDesc('class_id')[$i-1];

                            if ($lecturer->scheduleDrafts->sortByDesc('class_id')[$i]->class_id != $prev->class_id) {
                                // Only add to the courseCredits if class isn't a duplicate.
                                if ($scheduleDraft->semesters()->first()->current) {
                                    // Add to courseCredits if semester is currently running.
                                    $courseCredits += $scheduleDraft->course->credits;
                                } else {
                                    $courseCredits += 0;
                                }
                            }
                        } else if ($scheduleDraft->semesters()->first()->current) {
                            // Semester is currently running.
                            $courseCredits += $scheduleDraft->course->credits;
                        } else {
                            $courseCredits += 0;
                        }
                    }

                    $totalCredits = $lecturer->self_credit + $courseCredits;
                    ?>
                    @if($scheduleDraft->semesters()->first()->current)
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
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
