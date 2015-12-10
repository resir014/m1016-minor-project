@if(Auth::user()->userable_type === 'Admin')
<ul class="nav nav-pills nav-stacked">
  <li role="presentation"><a href="{{ URL::route('profile.index') }}">Profile</a></li>
  <li role="presentation"><a href="{{ URL::route('courses.index') }}">Courses</a></li>
  <li role="presentation"><a href="{{ URL::route('rooms.index') }}">Rooms</a></li>
  <li role="presentation"><a href="{{ URL::route('students.index') }}">Students</a></li>
  <li role="presentation"><a href="{{ URL::route('lecturers.index') }}">Lecturers</a></li>
  <li role="presentation"><a href="{{ URL::route('schedule-drafts.index') }}">Schedule Drafts</a></li>
  <li role="presentation"><a href="{{ URL::route('fixed-schedules.index') }}">Fixed Schedules</a></li>
</ul>
@elseif(Auth::user()->userable_type === 'Lecturer')
<ul class="nav nav-pills nav-stacked">
  <li role="presentation"><a href="{{ URL::route('profile.index') }}">Profile</a></li>
  <li role="presentation"><a href="{{ URL::route('schedule-drafts.index') }}">Schedule Drafts</a></li>
  <li role="presentation"><a href="{{ URL::route('fixed-schedules.index') }}">Fixed Schedules</a></li>
</ul>
@elseif(Auth::user()->userable_type === 'Student')
<ul class="nav nav-pills nav-stacked">
  <li role="presentation"><a href="{{ URL::route('profile.index') }}">Profile</a></li>
</ul>
@else
<ul class="nav nav-pills nav-stacked">
  <li role="presentation"><a href="{{ URL::route('profile.index') }}">Profile</a></li>
</ul>
@endif
