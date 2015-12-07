<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

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
    protected $fillable = ['id', 'admission_year', 'birth_date', 'status'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'birth_date'];

    /**
     * Get the user that this model is related to.
     */
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

    /**
     * Get all student's fixed schedules
     */
    public function fixedSchedules()
    {
        return $this->belongsToMany('App\FixedSchedule');
    }
}
