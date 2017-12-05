<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'img_address','tell','sex','address','customer_id','user_id'
        ,'created_date','created_time','updated_date','updated_time'

    ];
    public function Customer()
    {
        return $this->belongsTo('App/Customer');
    }

}
