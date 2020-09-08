<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\products;
use Faker\Generator as Faker;

$factory->define(products::class, function (Faker $faker) {

    $fakerNameProduct = '';
    $fakerMarkName = '';
    $fakerBodyType = '';
    $randomNumber = rand(1, 5);

    if ($randomNumber === 1) {
        $fakerMarkName = 'Plymouth';
        $fakerNameProduct = 'sedan';
        $fakerBodyType = 'Metal';
    } else
        if ($randomNumber === 2) {
            $fakerMarkName = 'Ford Explorer';
            $fakerNameProduct = 'SUV';
            $fakerBodyType = 'Metal';
        }
    if ($randomNumber === 3) {
        $fakerMarkName = 'Jeep Wragler';
        $fakerNameProduct = 'SUV';
        $fakerBodyType = 'Metal';
    }
    if ($randomNumber === 4) {
        $fakerMarkName = 'Cheby';
        $fakerNameProduct = 'sport';
        $fakerBodyType = 'Metal';
    }
    if ($randomNumber === 5) {
        $fakerMarkName = '934';
        $fakerNameProduct = 'sport';
        $fakerBodyType = 'Metal';
    }

    $users = \App\Models\User::pluck('id')->toArray();

    return [
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'price' => $faker->randomNumber(3),
        'size' => '1/64',
        'body_type' => $fakerBodyType,
        'color' => $faker->hexColor,
        'mark' => $fakerMarkName,
        'name' => $fakerNameProduct,
        'user_id' => $faker->randomElement($users),
        'type_category' => 'basic',
        'type_tire' => 'rubber',
        'Series' => 'premium',
        'url' => $faker->url
    ];
});

