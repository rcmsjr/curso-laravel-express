<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdColumnInTablePosts extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()
                    ->after('id');

            $table->foreign('category_id')
                    ->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_category_id_foreign');
        });
    }

}
