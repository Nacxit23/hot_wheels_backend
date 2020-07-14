<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\sells;
use Faker\Generator as Faker;

$factory->define(sells::class, function (Faker $faker) {

    $product = \App\products::pluck('id')->toArray();

    return [
        'datetime' => $faker->dateTimeThisDecade(),
        'product_id' => $faker->randomElement($product),
        'type_pay_id' => 3,
        'users_id' => 4,
        'voucher' => $faker->ean8
    ];
});
