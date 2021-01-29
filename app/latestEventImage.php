<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class latestEventImage extends Model
{
    protected $table = 'latest_event_image';
    protected $fillable = ['latest_events_id','image'];
}
