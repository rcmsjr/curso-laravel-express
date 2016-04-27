<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct(Category $category) {
        $categories = $category->where('actived', 1)->orderBy('name', 'ASC')->get();
        
        /**
         * Sharing global variable for all methods and views
         */
        view()->share('categories', $categories);
    }
    
    public function home(Post $post)
    {
        $posts = $post->where('actived', 1)->orderBy('created_at', 'DESC')->limit(8)->get();
        
        return view('site.home', compact('posts'));
    }

    public function postsByCategory($id, Post $post, Category $category)
    {
        $category = $category->find($id);

        // geting post by category and paginating with 8 items by page
        $posts = $post->where('category_id', $id)->where('actived', 1)->orderBy('created_at', 'DESC')->paginate(8);

        return view('site.category', compact('posts', 'category'));
    }

    public function post($id, Post $post)
    {
        $post = $post->findOrFail($id);

        return view('site.post', compact('post'));
    }
}
