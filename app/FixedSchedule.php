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
         'user_id',
         'lecturer_id',
         'room_id',
         'date',
         'shift',
         'student_id'
     ];

     /**
      * Get the lecturer of this schedule entry.
      */
     public function lecturer()
     {
         return $this->belongsTo('App\Lecturer');
     }

     /**
      * Get all students in this schedule entry.
      */
     public function students()
     {
         return $this->hasMany('App\Student');
     }
}
