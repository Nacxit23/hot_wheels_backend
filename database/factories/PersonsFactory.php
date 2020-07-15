<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\persons;
use Faker\Generator as Faker;

$factory->define(persons::class, function (Faker $faker) {
    return [
        'genre' => $faker->randomLetter,
        'date_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'city' => $faker->city,
        'first_name' => $faker->firstName,
        'identification' => $faker->unique()->uuid,
        'last_name' => $faker->lastName,
    ];
});
