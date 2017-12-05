<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title','short_des','des','author','image','status','see_count','user_id'
        , 'created_date','created_time','updated_date','updated_time'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Cat_Articles()
    {
        return $this->belongsToMany('App\Cat_Article');
    }
}
