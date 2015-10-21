<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $table = 'lecturers';

    public function user()
    {
        return $this->morphOne('User', 'userable');
    }
}
