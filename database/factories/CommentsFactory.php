<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Models\comments;
use Faker\Generator as Faker;

$factory->define(comments::class, function (Faker $faker) {

    $users = \App\Models\User::pluck('id')->toArray();
    $sells = \App\Models\sells::pluck('id')->toArray();

    return [
        'users_id' => $faker->randomElement($users),
        'sells_id' => $faker->randomElement($sells),
        'comment' => $faker->text
    ];
});
