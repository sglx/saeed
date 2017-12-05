<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Useful_Link extends Model
{
    protected $fillable = [
        'title','link','status','user_id'
        ,'created_date','created_time','updated_date','updated_time'

    ];

    public function User()
    {
        return $this->belongsTo('App/User');
    }
}
