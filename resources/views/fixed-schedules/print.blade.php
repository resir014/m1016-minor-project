<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SYFEI - Print Page</title>

    <link href="{{ asset('assets/stylesheets/print.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div class="container">
        <h2>Printable Form</h2>
        <p class="text-info">Right-click on this page and select "Print", or press <kbd>Ctrl</kbd> + <kbd>P</kbd> on Chrome.</p>

        <hr>

        <h3>Schedule Details</h3>

        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Lecturer</th>
                    <th>Course</th>
                    <th>Room</th>
                    <th>Day</th>
                    <th>Shift</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $fixedSchedule->scheduleDraft->id }}</td>
                    <td>{{ $fixedSchedule->scheduleDraft->lecturer->id }} - {{ $fixedSchedule->scheduleDraft->lecturer->user->name }}</td>
                    <td>{{ $fixedSchedule->scheduleDraft->course->id }} - {{ $fixedSchedule->scheduleDraft->course->name }}</td>
                    <td>{{ $fixedSchedule->room_id }}</td>
                    <td>{{ $fixedSchedule->day }}</td>
                    <td>{{ $fixedSchedule->shift }}</td>
                </tr>
            </tbody>
        </table>

        <h3>Students</h3>

        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Attendance (No. of Present/Total Sessions)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $i => $student)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>@{{ $student->fixedSchedules->attendance->count() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Attendance</h3>

        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Course</th>
                    <th>Lecturer</th>
                    <th>Class</th>
                    <th>Date</th>
                    <th>Attendance</th>
                    <th>Log Posted?</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $i => $attendance)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $attendance->fixedSchedule->course_id }} - {{ $attendance->fixedSchedule->course->name }}</td>
                        <td>{{ $attendance->fixedSchedule->lecturer_id }} - {{ $attendance->fixedSchedule->lecturer->user->name }}</td>
                        <td>{{ $attendance->fixedSchedule->scheduleDraft->class_id }}</td>
                        <td>{{ date('d F Y', strtotime($attendance->created_at)) }}</td>
                        <td>{{ $attendance->students->count() }}/{{ $attendance->fixedSchedule->students->count() }}</td>
                        <td>
                            @if($attendance->sessionLog)
                                <span class="text-success">Yes</span>
                            @else
                                <span class="text-danger">No</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Grades</h3>

        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Assignment Score</th>
                    <th>Midterm Score</th>
                    <th>Finals Score</th>
                    <th>Total Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grades as $i => $grade)
                    <tr>
                        <td>{{ $grade->student->id }}</td>
                        <td>{{ $grade->student->name }}</td>
                        <td>{{ $grade->assignment_score }}</td>
                        <td>{{ $grade->midterm_score }}</td>
                        <td>{{ $grade->final_score }}</td>
                        <td>{{ $grade->total_score }}</td>
                    </tr>
                @endforeach
                @foreach($students as $i => $student)
                    @if($student->grades->count() == 0)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
