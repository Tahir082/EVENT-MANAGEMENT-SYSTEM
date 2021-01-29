<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class description extends Model
{
    protected $table = 'descriptions';
    protected $fillable = ['image','title','description'];
}
