<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'title','question','status','option1','option2','option3','option4','option5','c1','c2','c3','c4','c5','user_id','customer_id'
        ,'created_date','created_time','updated_date','updated_time'

    ];

    public function User()
    {
        return $this->belongsTo('App/User');
    }
}
