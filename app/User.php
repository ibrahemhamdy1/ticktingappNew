<?php

namespace App;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setPasswordAttribute($date) {
        if (isset($date) && !empty($date)) {

            $this->attributes['password'] = bcrypt($date);
        }
    }

    public function notification()
    {
        return $this->hasMany('App/Notification');
    }


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }


    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    public function tickets()
    {
        return $this->hasMany('App/Ticket');
    }
}

