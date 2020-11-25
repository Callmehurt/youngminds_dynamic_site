<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
      'title', 'description', 'file', 'type', 'thumbnail'
    ];
}
