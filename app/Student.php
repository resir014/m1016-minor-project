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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nomor_induk', 'tahun_masuk', 'tanggal_lahir', 'status'];

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
        return $this->hasMany('App\FixedSchedule');
    }
}
