<?php

namespace App\Http\Controllers\Sys;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{

    /**
     * PostController constructor.
     */
    public function __construct(Post $post)
    {

    }
}
