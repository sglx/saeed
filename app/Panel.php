<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    protected $fillable = [
        'code','title','des','user_id'
        ,'created_date','created_time','updated_date','updated_time'

    ];
}
