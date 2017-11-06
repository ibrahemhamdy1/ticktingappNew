<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{

    protected $table = 'networks';
    public $timestamps = true;
    protected $fillable = array(

        'name',

       
        


    );




    public function clients()
    {
        return $this->hasMany('App/Client');
    }




}