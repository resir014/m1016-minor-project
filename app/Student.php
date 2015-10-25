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
    protected $fillable = ['student_id', 'tahun_masuk', 'status'];

    public function user()
    {
        return $this->morphOne('User', 'userable');
    }
}
