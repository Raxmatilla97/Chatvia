<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ModulMazmuni;
use Faker\Generator as Faker;

$factory->define(ModulMazmuni::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'slug' => $faker->word,
        'img' => $faker->word,
        'category' => $faker->word,
        'is_active' => $faker->word,
        'is_moderate' => $faker->word,
        'content' => $faker->text,
        'is_private' => $faker->word,
        'file' => $faker->word,
        'url_content' => $faker->word,
        'created_at' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
