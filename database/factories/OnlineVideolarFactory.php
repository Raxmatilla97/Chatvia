<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OnlineVideolar;
use Faker\Generator as Faker;

$factory->define(OnlineVideolar::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'youtube' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
