<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            
            $table->foreign('post_id')
                    ->references('id')->on('posts')
                    ->onDelete('cascade');
            
            $table->string('image');
            $table->string('legend', 150);
            $table->smallInteger('featured')->default(0);
            $table->integer('order')->default(0);
            $table->smallInteger('actived')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_images');
    }
}
