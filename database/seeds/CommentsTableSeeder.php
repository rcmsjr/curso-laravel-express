<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    }
    
    public function runRelationship($postId)
    {
        Comment::truncate();
        
        $totalComments = mt_rand(0, 10);
        factory(Comment::class, $totalComments)->create(['post_id' => $postId]);
    }
}
