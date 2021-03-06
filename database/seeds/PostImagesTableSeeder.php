<?php

use Illuminate\Database\Seeder;
use App\PostImage;

class PostImagesTableSeeder extends Seeder
{
    private $order;


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
        $this->order = 1;
        $totalImages = mt_rand(0, 8);
        factory(PostImage::class, $totalImages)->create(['post_id' => $postId])->each(function($postImage) {
            $postImage->order = $this->order;
            $postImage->save();
            
            $this->order++;
        });
    }
}
