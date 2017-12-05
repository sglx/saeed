<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'title','percent','status','expire','user_id','product_id'
        ,'created_date','created_time','updated_date','updated_time'

    ];
    public function Product()
    {
        $this->belongsTo('App/Product');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
