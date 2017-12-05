<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title','text','status','see','user_id','product_id'
        ,'created_date','created_time','updated_date','updated_time'

    ];
    public function Product()
    {
        return $this->belongsTo(Products::class );
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Customers()
    {
        return $this->belongsTo(Customers::class);
    }

}
