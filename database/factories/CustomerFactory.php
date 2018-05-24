<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'name'=> $faker->sentence(1),
        'phone'=> rand(1000000, 10000000),
        'email' => $faker->sentence(3),
        'image' => "/wahdatshop/uploads/files/imports/default.jpg",
        'address' => $faker->sentence(4),
        'extra_info' => $faker->sentence(4)

    ];
});
