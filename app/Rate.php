<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'product_id','customer_id','user_id'
        ,'created_date','created_time','updated_date','updated_time'

    ];

    public function Product()
    {
        return $this->belongsTo('App/Product');
    }

}
