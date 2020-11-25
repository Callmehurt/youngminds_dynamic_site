<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
      'title', 'content', 'image', 'user_id', 'topic'
    ];
}
