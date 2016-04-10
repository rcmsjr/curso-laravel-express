<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;

class SiteController extends Controller
{
    public function __construct() {
        $categories = [
            0 => 'Category 1',
            1 => 'Category 2',
            2 => 'Category 3',
            3 => 'Category 4',
            4 => 'Category 5',
        ];
        
        /**
         * Sharing global variable for all methods and views
         */
        view()->share('categories', $categories);
    }
    
    public function home(Post $post)
    {
        $posts = $post->where('actived', 1)->orderBy('created_at', 'DESC')->limit(8)->get();
        
        return view('home', compact('posts'));
    }
}
