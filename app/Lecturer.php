<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lecturers';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'beban_jabatan', 'jabatan', 'spesialisasi'];

    /**
     * Get the user that this model is related to.
     */
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

    /**
     * Get the lecturer's schedule drafts.
     */
    public function scheduleDrafts()
    {
        return $this->hasMany('App\ScheduleDraft');
    }

    /**
     * Get the lecturer's fixed schedules.
     */
    public function fixedSchedules()
    {
        return $this->hasMany('App\FixedSchedule');
    }

    public function scheduleApproval()
    {
        return $this->belongsTo('App\ScheduleApproval');
    }
}
