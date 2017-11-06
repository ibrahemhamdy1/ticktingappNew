<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    public $timestamps = true;
    protected $table = 'tickets';
    protected $fillable = array(
        'client_id',
        'user_id',
        'type',
        'open_date',
        'body',
        'periority',
        'status',
        'closed_date',
        'seen',
        'title',
        'views',
        'employee_id',
        'open_by',
        'close_by',
    );

    protected $appends = ['status_name', 'type_name'];


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }


    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function employee()
    {
        return $this->belongsTo('App\User', 'employee_id');
    }

    public function openemployee()
    {
        return $this->belongsTo('App\User', 'open_by');
    }

    public function closeemployee()
    {
        return $this->belongsTo('App\User', 'close_by');
    }

    public function getStatusNameAttribute($value)
    {
        $status = array(
            "0" => "New",
            "1" => "append",
            "2" => "Solved",
            "3" => "Closed",

        );
        return $status[$this->status];
    }

    public function getTypeNameAttribute($value)
    {
        $status = array(
            "0" => "Sales",
            "1" => "Support",

        );
        return $status[$this->type];
    }

    public function notification()
    {
        return $this->hasMany('App/Notification');
    }


}