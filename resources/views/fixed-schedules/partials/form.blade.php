<div class="form-group" id="bloodhound-courses">
    {!! Form::label('course_id', 'Course ID', ['class' => 'control-label']) !!}
    {!! Form::hidden('course_id', $fixedSchedule->scheduleDraft->course_id) !!}
    <p class="form-control-static">{{ $fixedSchedule->scheduleDraft->course_id }}</p>
</div>

<div class="form-group" id="bloodhound-lecturers">
    {!! Form::label('lecturer_id', 'Lecturer ID', ['class' => 'control-label']) !!}
    {!! Form::hidden('lecturer_id', $fixedSchedule->scheduleDraft->lecturer->id) !!}
    <p class="form-control-static">{{ $fixedSchedule->scheduleDraft->lecturer->id }}</p>
</div>

<div class="form-group" id="bloodhound-rooms">
    {!! Form::label('room_id', 'Room Number', ['class' => 'control-label']) !!}
    {!! Form::text('room_id', null, ['class' => 'form-control typeahead']) !!}
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
