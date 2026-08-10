<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [ 
        "name",
        "position",
        "image",
        "message"
    ];
    protected $guarded = [];
}
