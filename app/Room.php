<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'name',
        'type',
        'location',
        'available'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'available' => 'boolean',
    ];

    /**
     * Get the schedules that are in this room
     */
    public function scheduleDraft()
    {
        return $this->hasMany('App\ScheduleDraft');
    }
}
