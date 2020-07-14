<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\comments;
use Faker\Generator as Faker;

$factory->define(comments::class, function (Faker $faker) {

    $users = \App\User::pluck('id')->toArray();
    $sells = \App\sells::pluck('id')->toArray();
    return [
        'users_id' => $faker->randomElement($users),
        'sells_id' => $faker->randomElement($sells),
        'comments' => $faker->text,
    ];
});
