<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Post;
use App\Tag;
use App\Http\Requests;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct(Category $category, Author $author) {
        $categories = $category->where('actived', 1)->orderBy('name', 'ASC')->get();
        $authors = $author->where('actived', 1)->orderBy('name', 'ASC')->get();

        /**
         * Sharing global variable for all methods and views
         */
        view()->share(['categories' => $categories, 'authors' => $authors]);
    }
    
    public function home(Post $post)
    {
        $posts = $post->where('actived', 1)->orderBy('created_at', 'DESC')->limit(8)->get();
        
        return view('site.home', compact('posts'));
    }

    public function postsByCategory($id, Category $category)
    {
        $category = $category->find($id);

        // geting post by category and paginating with 8 items by page
        $posts = $category->posts()->where('actived', 1)->orderBy('created_at', 'DESC')->paginate(8);

        return view('site.category', compact('posts', 'category'));
    }

    public function postsByTag($id, Tag $tag)
    {
        $tag = $tag->find($id);

        // geting post by tag and paginating with 8 items by page
        $posts = $tag->posts()->where('actived', 1)->orderBy('created_at', 'DESC')->paginate(8);

        return view('site.tag', compact('posts', 'tag'));
    }
    public function postsByAuthor($id, Author $author)
    {
        $author = $author->find($id);

        // geting post by tag and paginating with 8 items by page
        $posts = $author->posts()->where('actived', 1)->orderBy('created_at', 'DESC')->paginate(8);

        return view('site.author', compact('posts', 'author'));
    }

    public function post($id, Post $post)
    {
        $post = $post->findOrFail($id);

        return view('site.post', compact('post'));
    }

    public function authors(Author $author)
    {
        $authors = $author->where('actived', 1)->orderBy('name', 'ASC')->get();

        return view('site.authors', compact('authors'));
    }
}
