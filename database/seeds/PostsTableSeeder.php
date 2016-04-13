<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Comment::truncate();
        \App\PostImage::truncate();
        Post::truncate();

        factory(Post::class, 15)->create()->each(function($post) {
            $post->author_id = \App\Author::orderBy(\DB::raw('RAND()'))->limit(1)->lists('id')[0];
            $post->category_id = \App\Category::orderBy(\DB::raw('RAND()'))->limit(1)->lists('id')[0];
            $post->save();
            $this->resolve(CommentsTableSeeder::class)->runRelationship($post->id);
            $this->resolve(PostImagesTableSeeder::class)->runRelationship($post->id);
        });
    }
}
