<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Spikerlar;
use Faker\Generator as Faker;

$factory->define(Spikerlar::class, function (Faker $faker) {

    return [
        'fish' => $faker->word,
        'ish_joyi' => $faker->word,
        'about' => $faker->word,
        'is_active' => $faker->word,
        'created_at' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
