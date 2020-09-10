<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'nameUser' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $faker->password,// password
        'api_token' => Str::random(80),
        'genre' => $faker->randomLetter,
        'date_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'city' => $faker->city,
        'first_name' => $faker->firstName,
        'identification' => $faker->unique()->uuid,
        'last_name' => $faker->lastName,
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'code_verification' => Str::random(50),

    ];
});
