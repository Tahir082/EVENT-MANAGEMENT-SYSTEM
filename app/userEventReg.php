<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userEventReg extends Model
{
    protected $table = 'users_event_reg';
    protected $fillable = ['userid','event_name','user_name','user_email','user_contact','payment'];
}
