<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OnlineVideoDars;
use Faker\Generator as Faker;

$factory->define(OnlineVideoDars::class, function (Faker $faker) {

    return [
        'title' => $faker->text,
        'slug' => $faker->text,
        'img' => $faker->word,
        'content' => $faker->word,
        'url' => $faker->text,
        'is_active' => $faker->word,
        'created_at' => $faker->word,
        'yutube_video_url' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
