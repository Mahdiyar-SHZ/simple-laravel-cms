<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $guarded = [];

    public function blogcat(){
        return $this->belongsTo(BlogCategory::class, 'blog_categoty','id');
    }
}
