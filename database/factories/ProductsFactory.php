<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\products;
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
    }
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
    if ($randomNumber === 4) {
        $fakerNameProduct = 'Porsche';
        $fakerMarkName = '934';
        $fakerNameProduct = 'sport';
        $fakerBodyType = 'Metal';
    }
    $productCategorie = \App\products_categorie::pluck('id')->toArray();

    return [
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'price' => $faker->randomNumber(3),
        'product_categories_id' => $faker->randomElement($productCategorie),
        'size' => '1/64',
        'body_type' => $fakerBodyType,
        'color' => $faker->hexColor,
        'mark' => $fakerMarkName,
        'name' => $fakerNameProduct,
        'type' => $fakerNameProduct
    ];
});
