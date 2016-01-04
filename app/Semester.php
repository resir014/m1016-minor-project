<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'semesters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'current'
    ];

    /**
     * Get all schedule drafts on this semester.
     */
    public function scheduleDrafts()
    {
        return $this->belongsToMany('App\ScheduleDraft');
    }
}
