<div class="form-group" id="bloodhound-courses">
    {!! Form::label('course_id', 'Course ID', ['class' => 'control-label']) !!}
    {!! Form::text('course_id', null, ['class' => 'form-control typeahead']) !!}
</div>

<div class="form-group" id="bloodhound-lecturers">
    {!! Form::label('lecturer_id', 'Lecturer ID', ['class' => 'control-label']) !!}
    @if(Auth::user()->userable_type == 'Lecturer')
        {!! Form::hidden('lecturer_id', Auth::user()->userable_id) !!}
        <p class="form-control-static">{{ Auth::user()->userable_id }}</p>
    @else
        {!! Form::text('lecturer_id', null, ['class' => 'form-control typeahead']) !!}
    @endif
</div>

<div class="form-group" id="bloodhound-rooms">
    {!! Form::label('room_id', 'Room Number', ['class' => 'control-label']) !!}
    {!! Form::text('room_id', null, ['class' => 'form-control typeahead']) !!}
</div>

<div class="form-group">
    {!! Form::label('semester_list', 'Semester') !!}
    {!! Form::select('semester_list[]', $semesters, null, ['class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group" id="bloodhound-rooms">
    {!! Form::label('class_id', 'Class', ['class' => 'control-label']) !!}
    {!! Form::text('class_id', null, ['class' => 'form-control typeahead']) !!}
</div>

<div class="form-group">
    {!! Form::label('day', 'Day') !!}
    {!! Form::select('day', [
        'Monday' => 'Monday',
        'Tuesday' => 'Tuesday',
        'Wednesday' => 'Wednesday',
        'Thursday' => 'Thursday',
        'Friday' => 'Friday',
        'Saturday' => 'Saturday'
    ], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('shift', 'Shift') !!}
    {!! Form::select('shift', [
        1 => '1 (07:00-09:00)',
        2 => '2 (09:00-11:00)',
        3 => '3 (13:00-15:00)',
        4 => '4 (15:00-17:00)'
    ], null, ['class' => 'form-control']) !!}
</div>
