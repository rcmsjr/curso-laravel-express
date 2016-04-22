<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'content', 'actived'];
    
    public function category() {
        return $this->belongsTo(\App\Category::class);
    }
    public function author() {
        return $this->belongsTo(\App\Author::class);
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

    public function getDatePostedAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }
}
