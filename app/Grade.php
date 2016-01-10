<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'grades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fixed_schedule_id',
        'student_id',
        'course_id',
        'assignment_score',
        'midterm_score',
        'final_score',
        'total_score'
    ];

    /**
     * A Grade form belongs to a schedule.
     */
    public function fixedSchedule()
    {
        return $this->belongsTo('App\FixedSchedule');
    }

    /**
     * A Grade form belongs to a student.
     */
    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    /**
     * Get the Course associated with this Grade form.
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
