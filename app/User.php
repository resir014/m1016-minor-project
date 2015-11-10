<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'userable_type', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get all of the owning userable models.
     */
    public function userable()
    {
        return $this->morphTo();
    }

    /**
     * Sets the default values for the userable_type attribute
     *
     * @param  string  $value
     * @return string
     */
     public function setUserableTypeAttribute($value)
     {
         $this->attributes['userable_type'] = 'App\\' . $value;
     }

     /**
      * Strips the 'App\' out of the userable_type attribute when calling it
      */
     public function getUserableTypeAttribute($value)
     {
         return substr($value, 4);
     }
}
