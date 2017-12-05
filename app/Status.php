<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'code_status','title','des','table_id','user_id'
        ,'created_date','created_time','updated_date','updated_time'

    ];

    public function User()
    {
        return $this->belongsTo('App/User');
    }

    public function Ticket()
    {
        return $this->belongsTo('App/Ticket');
    }
}
