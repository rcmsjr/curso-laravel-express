<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;

class TagTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Tag::truncate();
        $posts = new Post();

        $allPosts = $posts->all();
        $totalPosts = $allPosts->count();

        $tags = factory(Tag::class, 10)->create()->each(function($tag) use($allPosts, $totalPosts) {
            $countPosts = 0;
            $totalPostsSync = mt_rand(0, $totalPosts);

            if ($totalPostsSync > 0) {
                $postsId = [];
                while ($countPosts <= $totalPostsSync) {
                    $keyPost = mt_rand(0, ($totalPosts - 1));
                    $id = $allPosts[$keyPost]->id;
                    if (!in_array($id, $postsId)) {
                        array_push($postsId, $id);
                        $countPosts++;
                    }
                }

                $tag->posts()->attach($postsId);
            }
        });
    }

}
