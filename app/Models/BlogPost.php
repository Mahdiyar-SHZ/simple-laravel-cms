<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $guarded = [];

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function blogcat(){
        return $this->belongsTo(BlogCategory::class, 'blog_categoty','id');
    }
}
