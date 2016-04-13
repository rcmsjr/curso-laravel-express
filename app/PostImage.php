<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $fillable = ['post_id', 'image', 'legend', 'featured', 'order', 'actived'];
    
    public function post() {
        return $this->belongsTo(\App\Post::class);
    }
}
