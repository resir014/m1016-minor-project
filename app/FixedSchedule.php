<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixedSchedule extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fixed_schedules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'schedule_draft_id',
        'lecturer_id',
        'course_id',
        'room_id',
        'day',
        'shift'
    ];

     /**
      * Get the Schedule Draft that inherits this fixed schedule.
      */
     public function scheduleDraft()
     {
         return $this->belongsTo('App\ScheduleDraft');
     }

     /**
      * Get the Room that this schedule is in.
      */
     public function room()
     {
         return $this->belongsTo('App\Room');
     }

     public function lecturer()
     {
         return $this->belongsTo('App\Lecturer');
     }

     /**
      * Get all students in this schedule entry.
      */
     public function students()
     {
         return $this->belongsToMany('App\Student');
     }

     public function getStudentListAttribute()
     {
         return $this->students->lists('id');
     }
}
