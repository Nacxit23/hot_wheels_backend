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
        $fakerNameProduct = 'Fury';
        $fakerMarkName = 'Plymouth';
        $fakerNameProduct = 'sedan';
        $fakerBodyType = 'Metal';
    } else
        if ($randomNumber === 2) {
            $fakerNameProduct = 'Explorer';
            $fakerMarkName = 'Ford Explorer';
            $fakerNameProduct = 'SUV';
            $fakerBodyType = 'Metal';
        }
    if ($randomNumber === 3) {
        $fakerNameProduct = 'Jeep';
        $fakerMarkName = 'Jeep Wragler';
        $fakerNameProduct = 'SUV';
        $fakerBodyType = 'Metal';
    }
    if ($randomNumber === 4) {
        $fakerNameProduct = 'Cobra';
        $fakerMarkName = 'Cheby';
        $fakerNameProduct = 'sport';
        $fakerBodyType = 'Metal';
    }
    if ($randomNumber === 5) {
        $fakerNameProduct = 'Porsche';
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
        'type' => $fakerNameProduct,
        'user_id' => $faker->randomElement($users),
    ];
});

