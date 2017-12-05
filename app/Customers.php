<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name','family','username','password','status','user_id','customer_id'
        ,'created_date','created_time','updated_date','updated_time'

    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }
}
