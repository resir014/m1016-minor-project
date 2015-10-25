<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** Load the Students table. */
    protected $table = 'students';

    /** Allow the following columns to be mass-assignable. */
    protected $fillable = ['student_id', 'tahun_masuk', 'status'];

    public function user()
    {
        return $this->morphOne('User', 'userable');
    }
}
