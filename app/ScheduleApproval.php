<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleApproval extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schedule_approvals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lecturer_id',
        'shifts_available',
        'semester',
        'cleared'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'day' => 'string',
    ];

    public function lecturer()
    {
        return $this->belongsTo('App\Lecturer');
    }
}
