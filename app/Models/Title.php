<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = [
        'features',
        'reviews',
        'answers',
        'record',
        'card',
        'card_title',
        'card_desc'
    ];
}
