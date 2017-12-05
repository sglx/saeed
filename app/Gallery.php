<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title','address','status','user_id'
        ,'created_date','created_time','updated_date','updated_time'

    ];

    public function User()
    {
        return $this->belongsTo('App/User');
    }
}
