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
        'day',
        'shift'
    ];

    /**
     * An attendance form belongs to a Fixed Schedule.
     */
    public function fixedSchedule() {
        return $this->belongsTo('App\FixedSchedule');
    }

    /**
     * An attendance form has one Session Log.
     */
    public function sessionLog()
    {
        return $this->hasOne('App\SessionLog');
    }

    /**
     * Get all students present in this form.
     */
    public function students() {
        return $this->belongsToMany('App\Student');
    }
}
