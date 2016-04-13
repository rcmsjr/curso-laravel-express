<?php

use Illuminate\Database\Seeder;
use App\PostImage;

class PostImagesTableSeeder extends Seeder
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
        PostImage::truncate();
        
        $totalImages = mt_rand(0, 8);
        factory(PostImage::class, $totalImages)->create(['post_id' => $postId]);
    }
}
