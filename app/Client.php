<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array(

         'name',
         'email',
        'phone',
        'address',
        'packet_id',
        'mobile',
        'packet_id',
        'network_id',
        'start_date',
        'account',
        'user_name',
        'customer_id',
        'order_status',
     



      
       



    );

   
    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    public function packet()
    {
        return $this->belongsTo('App\Packet');
    }



    public function network()
    {
        return $this->belongsTo('App\Network');
    }



}