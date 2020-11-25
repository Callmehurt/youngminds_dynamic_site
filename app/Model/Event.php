<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'content', 'image', 'event_date', 'user_id', 'event_time'
    ];
}
