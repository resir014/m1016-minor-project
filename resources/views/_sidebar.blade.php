@if(Auth::user()->userable)
    @if(Auth::user()->userable_type === 'Admin')
    <ul class="nav nav-pills nav-stacked">
        <li role="presentation"><a href="{{ route('profile.index') }}">Profile</a></li>
        <li role="presentation"><a href="{{ route('courses.index') }}">Courses</a></li>
        <li role="presentation"><a href="{{ route('rooms.index') }}">Rooms</a></li>
        <li role="presentation"><a href="{{ route('students.index') }}">Students</a></li>
        <li role="presentation"><a href="{{ route('lecturers.index') }}">Lecturers</a></li>
        <li role="presentation"><a href="{{ route('schedule-drafts.index') }}">Schedule Drafts</a></li>
        <li role="presentation"><a href="{{ route('fixed-schedules.index') }}">Fixed Schedules</a></li>
        <li role="presentation"><a href="{{ route('schedule-approvals.index') }}">Schedule Requests</a></li>
        <li role="presentation"><a href="{{ route('attendance.index') }}">All Attendance</a></li>
        <li role="presentation"><a href="{{ url('/mockups/perubahan-nilai') }}">Update Grades</a></li>
    </ul>
    @elseif(Auth::user()->userable_type === 'Lecturer')
    <ul class="nav nav-pills nav-stacked">
        <li role="presentation"><a href="{{ route('profile.index') }}">Profile</a></li>
        <li role="presentation"><a href="{{ route('schedule-drafts.index') }}">Schedule Drafts</a></li>
        <li role="presentation"><a href="{{ route('schedule-approvals.create') }}">Schedule Requests</a></li>
        <li role="presentation"><a href="{{ route('fixed-schedules.index') }}">Fixed Schedules</a></li>
        <li role="presentation"><a href="{{ url('/session-log') }}">Session Log</a></li>
        <li role="presentation"><a href="{{ url('/mockups/input-nilai') }}">Input Grades</a></li>
    </ul>
    @endif
@else
<ul class="nav nav-pills nav-stacked">
    <li role="presentation"><a href="{{ route('profile.index') }}">Profile</a></li>
</ul>
@endif
