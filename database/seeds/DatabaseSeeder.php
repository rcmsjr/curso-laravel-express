<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        // Disable Foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        factory(App\User::class)->create(
            [
                'name' => 'Roberto Mariano',
                'email' => 'rcmsjr@gmail.com',
                'password' => bcrypt(123456),
                'remember_token' => str_random(10),
            ]
        );
        
        $this->call(AuthorsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        DB::table('posts_tags')->truncate();
        $this->call(TagTableSeeder::class);
        
        // FOREIGN_KEY_CHECKS is supposed to only apply to a single
        // connection and reset itself but I like to explicitly
        // undo what I've done for clarity
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
