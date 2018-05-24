<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function deals()
    {
        return $this->hasMany('App\Deal');
    }

    public function Sales()
    {
        return $this->hasMany('App\Sales');
    }

 public function customer()
    {
        return $this->hasOne('App\Customer');
    }

}
