<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';
    public $timestamps = true;
    protected $fillable = array(

         'comment',
         'ticket_id',
         'user_id',


    );
    protected $appends = ['human_date'];



    public function getHumanDateAttribute($value)
    {
        Carbon::setLocale('en');
        if (is_null($this->created_at)) {
            return $value;
        }
        $value = $this->created_at->diffForHumans(Carbon::setToStringFormat('jS \o\f F, Y g:i:s a'));
        return $value;
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