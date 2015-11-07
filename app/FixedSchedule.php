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
     protected $fillable = [];
}
