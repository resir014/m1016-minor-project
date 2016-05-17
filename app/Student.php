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
     * The class name to be used in polymorphic relations.
     *
     * @var string
     */
    protected $morphClass = 'Student';

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
    protected $fillable = [
        'id',
        'name',
        'admission_year',
        'birth_date',
        'password',
        'active'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'birth_date'];

    /**
     * Properly format birth_date attribute when saving.
     */
    public function setBirthDateAttribute($date)
    {
        $this->attributes['birth_date'] = \Carbon\Carbon::parse($date)->format('Y-m-d');
    }

    /**
     * Get the birth_date attribute.
     *
     * @param  $date
     * @return string
     */
    public function getBirthDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('Y-m-d');
    }

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

    /**
     * Get all the grades this student has.
     */
    public function grades()
    {
        return $this->hasMany('App\Grade');
    }

    /**
     * Get all the attendance forms the Student is present in.
     */
    public function attendanceForms() {
        return $this->belongsToMany('App\AttendanceForm');
    }
}
