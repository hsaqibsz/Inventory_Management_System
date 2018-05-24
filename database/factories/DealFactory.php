<?php

use Faker\Generator as Faker;

$factory->define(App\Deal::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'customer_id' => rand(1, 100),
        'description'=> $faker->sentence(5),
        'bill_number' => rand(10, 100), //uniqid(),
        'debit' => rand(10, 100),
        'credit' => rand(10, 100),
        'balance' => rand(10, 100)
    ];
});
