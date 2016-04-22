<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'nickname', 'email', 'avatar', 'actived'];

    public function posts() {
        return $this->hasMany(\App\Post::class);
    }
}
