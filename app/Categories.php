<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title','des','categories_id','user_id','state'
        ,'created_date','created_time','updated_date','updated_time'
    ];

    public function Products()
    {
        return $this->belongsToMany(Products::class);
    }
    public function Users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function parent() {

        return $this->hasOne(Categories::class,'id','categories_id');
    }
    public function subCategories()
    {
        return $this->hasMany(Categories::class,'id','categories_id');
    }
}
