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
     * Get all student's fixed schedules
     */
    public function fixedSchedules()
    {
        return $this->belongsToMany('App\FixedSchedule');
    }

    /**
     * Get all the attendance forms the Student is present in.
     */
    public function attendanceForms() {
        return $this->belongsToMany('App\AttendanceForm');
    }
}
