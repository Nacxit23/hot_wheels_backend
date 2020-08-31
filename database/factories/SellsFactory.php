<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Models\sells;
use Faker\Generator as Faker;

$factory->define(sells::class, function (Faker $faker) {

    $product = \App\Models\products::pluck('id')->toArray();

    return [
        'datetime' => $faker->dateTimeThisDecade(),
        'product_id' => $faker->randomElement($product),
        'type_pay_id' => 3,
        'user_id' => 4,
    ];
});
