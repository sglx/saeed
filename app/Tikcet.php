<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tikcet extends Model
{
    protected $fillable = [
        'question','answer','status','user_id','customer_id','status_id'
        ,'created_date','created_time','updated_date','updated_time'

    ];

    public function User()
    {
        return $this->belongsTo('App/User');
    }
    public function Status()
    {
        return $this->hasMany('App/Status');
    }
}
