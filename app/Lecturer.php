<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lecturers';

    public function user()
    {
        return $this->morphOne('User', 'userable');
    }
}
