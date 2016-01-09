<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionLog extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'session_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fixed_schedule_id',
        'attendance_form_id',
        'score_form_id',
        'number_of_students_present',
        'remarks'
    ];

    /**
     * A Session Log entry belongs to an Attendance Form.
     */
    public function attendanceForm()
    {
        return $this->belongsTo('App\AttendanceForm');
    }

    /**
     * Get the schedule associated with this Session Log.
     */
    public function fixedSchedule()
    {
        return $this->belongsTo('App\FixedSchedule');
    }
}
