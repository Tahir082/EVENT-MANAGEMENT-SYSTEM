<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpcomingEvent extends Model
{
    protected $table = 'upcoming_events';
    protected $fillable = ['title','description','image'];
}
