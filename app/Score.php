<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'positive','negative','product_id','user_id','product_id'
        ,'created_date','created_time','updated_date','updated_time'

    ];

    public function User()
    {
        return $this->belongsTo('App/User');
    }
    public function Product()
    {
        return $this->belongsTo(Products::class);
    }
}
