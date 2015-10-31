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
    protected $fillable = ['nomor_induk', 'tahun_masuk', 'tanggal_lahir', 'status'];

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}
