<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Author::class, function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->name,
        'nickname' => studly_case(str_slug($name, '_')),
        'email' => strtolower($faker->safeEmail),
        'avatar' => $faker->imageUrl(70, 70, 'cats'),
        'actived' => mt_rand(0,1),
        'created_at' => $date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'updated_at' => $date,
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'actived' => mt_rand(0,1),
        'created_at' => $date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'updated_at' => $date,
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        //'post_id' => \App\Post::orderBy(\DB::raw('RAND()'))->limit(1)->lists('id')[0],
        'name' => $name = $faker->name,
        'email' => strtolower($faker->safeEmail),
        'comment' => $faker->paragraph,
        'created_at' => $date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'updated_at' => $date,
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'content' => $faker->paragraph,
        'actived' => mt_rand(0,1),
        'created_at' => $date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'updated_at' => $date,
    ];
});

$factory->define(App\PostImage::class, function (Faker\Generator $faker) {
    return [
        //'post_id' => \App\Post::orderBy(\DB::raw('RAND()'))->limit(1)->lists('id')[0],
        'image' => $faker->imageUrl(640, 480),
        'legend' => $faker->sentence(4, true),
        'featured' => mt_rand(0,1),
        'order' => 0,
        'actived' => mt_rand(0,1),
        'created_at' => $date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'updated_at' => $date,
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'actived' => mt_rand(0,1),
        'created_at' => $date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'updated_at' => $date,
    ];
});