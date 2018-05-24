<?php

use Faker\Generator as Faker;

$factory->define(App\Imports::class, function (Faker $faker) {
    return [
        'category_id' => rand(1,4), 
        'p_name' => $faker->sentence(1),
        'p_image' => '/wahdatshop/uploads/files/imports/default.jpg',
        'p_quantity' => rand(50, 1000),
        'price' => rand(400, 12000),
        'profit' => rand(4, 6),
        'country' =>'afghanistan',
        'neworuse' => rand(0, 1),
        'quality' => rand(0, 1),
        'guaranty' => rand(0, 1),

    ];
});
 