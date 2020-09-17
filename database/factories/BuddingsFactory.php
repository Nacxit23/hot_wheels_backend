<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\buddings;
use Faker\Generator as Faker;

$factory->define(buddings::class, function (Faker $faker) {

    $users = \App\Models\sells::pluck('id')->toArray();


    return [
        'date_budding' => $faker->dateTime,
        'price' => $faker->randomNumber(2),
        'users_id' => $faker->randomElement($users),
        'auction_id' => 1,
        'comments' => $faker->text
    ];
});
