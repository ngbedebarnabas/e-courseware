<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Faculty;
use Faker\Generator as Faker;

$factory->define(\App\Faculty::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(1)
    ];
});
