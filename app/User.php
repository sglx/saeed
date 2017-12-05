<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait; // add this trait to your user model

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','family','username', 'email', 'password'
        ,'created_date','created_time','updated_date','updated_time'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Products()
    {
        return $this->hasMany(Products::class);
    }
    public function Categories()
    {
        return $this->hasMany(Categories::class);
    }
    public function Comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function Customers()
    {
        return $this->hasMany(Customer::class);
    }
    public function Scores()
    {
        return $this->hasMany('App\Score');
    }
    public function Discounts()
    {
        return $this->hasMany('App\Discount');
    }
    public function Cat_Article()
    {
        return $this->hasMany('App\Cat_Article');
    }
    public function Article()
    {
        return $this->hasMany('App\Article');
    }
    public function Questions()
    {
        return $this->hasMany('App\Question');
    }
    public function Extra_Pages()
    {
        return $this->hasMany('App\Extra_Page');
    }
    public function Pages()
    {
        return $this->hasMany('App\Pages');
    }
    public function Useful_Links()
    {
        return $this->hasMany('App\Useful_Link');
    }
    public function Gallery()
    {
        return $this->hasMany('App\Gallery');
    }
    public function Survey()
    {
        return $this->hasMany('App\Survey');
    }
    public function Status()
    {
        return $this->hasMany('App\Status');
    }


}