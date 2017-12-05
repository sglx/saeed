<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'img_defualt','img1','img2','img3','name','short_des','long_des', 'price', 'status','stock','user_id','see'
        ,'vip','created_date','created_time','updated_date','updated_time'

    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function Discounts()
    {
        return $this->hasMany('App\Discount');
    }
    public function Categories()
    {
        return $this->belongsToMany(Categories::class);
    }
    public function Rate()
    {
        return $this->hasOne(Rate::class);

    }
}
