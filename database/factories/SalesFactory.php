<?php

use Faker\Generator as Faker;

$factory->define(App\Sales::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'customer_id' => rand(1, 100),
        'imports_id' => rand(1, 100),  //uniqid(),
        'quantity' => rand(1, 100),  //uniqid(),
        'description'=> $faker->sentence(5),
        'bill_number' => rand(10, 100),  //uniqid(),
        'price' => rand(10, 100),
        'priceDefault' => rand(10, 100),
        'profit' => rand(10, 100),
        'discount' => rand(1, 10),
        'total' => rand(100, 1000),
        'net_total' => rand(100, 1000),
        'paid' => rand(10, 100),
        'balance' => rand(10, 100)

    ];
});

