<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_image extends Model
{
    protected $fillable = ['post_id', 'image', 'legend', 'featured', 'order', 'actived'];
}
