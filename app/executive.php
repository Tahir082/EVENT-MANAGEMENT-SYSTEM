<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class executive extends Model
{
    protected $table = 'executives';
    protected $fillable = ['image','name','title','std_id','contact'];
}
