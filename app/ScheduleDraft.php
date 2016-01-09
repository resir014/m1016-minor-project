<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleDraft extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schedule_drafts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'lecturer_id',
        'room_id',
        'class_id',
        'day',
        'shift'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'day' => 'string',
    ];

    /**
     * Get the schedule's available courses.
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    /**
     * Get the schedule's lecturer.
     */
    public function lecturer()
    {
        return $this->belongsTo('App\Lecturer');
    }

    /**
     * Get the Fixed Schedule associated with this draft.
     */
    public function fixedSchedule()
    {
        return $this->hasOne('App\FixedSchedule');
    }

    /**
     * Get all semesters that apply to this Draft
     */
    public function semesters()
    {
        return $this->belongsToMany('App\Semester');
    }

    /**
     * Get the schedule's room.
     */
    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    /**
     * Returns a list of all semesters available.
     *
     * @return array
     */
    public function getSemesterListAttribute()
    {
        return $this->semesters->lists('id')->toArray();
    }

    /**
     * Returns true if semester is current.
     *
     * @return boolean
     */
    public function getIsCurrentSemesterAttribute() {
        return $this->semesters->current();
    }

    /**
     * All current semesters.
     */
    public function scopeCurrentSemester($query) {
        $query->semesters->first()->current;
    }
}
