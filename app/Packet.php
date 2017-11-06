<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{

    protected $table = 'packets';
    public $timestamps = true;
    protected $fillable = array(

        'name',
        'price',
        'type',
        'sale',
        'cat_id',
        'limited',
       
        


    );

    public function category()
    {
        return $this->belongsTo('App/Category');
    }



    public function clients()
    {
        return $this->hasMany('App/Client');
    }




}