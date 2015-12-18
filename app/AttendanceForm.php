<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceForm extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attendance_forms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fixed_schedule_id',
        'lecturer_id',
        'course_id',
        'shift'
    ];
}
