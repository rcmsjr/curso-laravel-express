<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'name', 'email', 'comment'];
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function getRightNowAttribute()
    {
        $currentDate = Carbon::now();
        $dateCreated = new Carbon($this->created_at);

        return $currentDate->diffForHumans($dateCreated);
    }
}
