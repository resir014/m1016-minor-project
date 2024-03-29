<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

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
    protected $fillable = ['id', 'name', 'credits', 'active'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * Get the course's available schedule drafts.
     */
    public function scheduleDraft()
    {
        return $this->hasOne('App\ScheduleDraft');
    }

    /**
     * Get all Schedules linked to this course.
     */
    public function fixedSchedules()
    {
        return $this->hasMany('App\FixedSchedule');
    }

    /**
     * Get all Grade entries associated with this course.
     */
    public function grades()
    {
        return $this->hasMany('App\Grade');
    }
}
