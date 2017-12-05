<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title','text','image','status','user_id'
        ,'created_date','created_time','updated_date','updated_time'

    ];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
