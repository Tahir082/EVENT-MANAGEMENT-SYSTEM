<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class latestEvent extends Model
{
    protected $table = 'latest_events';
    protected $fillable = ['title','description'];
}
