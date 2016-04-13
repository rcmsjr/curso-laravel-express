<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'content', 'actived'];
    
    public function category() {
        return $this->belongsTo(\App\Category::class);
    }
    
    public function comments() {
        return $this->hasMany(\App\Comment::class);
    }
    
    public function images() {
        return $this->hasMany(\App\PostImage::class);
    }
    
    public function tags() {
        return $this->belongsToMany(\App\Tag::class, 'posts_tags');
    }
}
