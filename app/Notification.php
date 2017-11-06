<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notitfaction';
    public $timestamps = true;
    protected $fillable = array(

         'messager',
         'ticket_id',
        'seen',
        'user_id',
        

    );

    public function packets()
    {
        return $this->hasMany('App/Packet');
    }


    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}