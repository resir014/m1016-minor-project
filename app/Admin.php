<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admins';

    public function users()
    {
        return $this->morphOne('User', 'userable');
    }
}
