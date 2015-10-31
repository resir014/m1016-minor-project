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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nomor_induk', 'beban_jabatan', 'jabatan', 'spesialisasi'];

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}
