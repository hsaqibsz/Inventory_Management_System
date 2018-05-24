<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => 'hedayatullah',
        'email' => 'hedayat_wahdat09@yahoo.com',
        'admin' => 1,
        'password' => bcrypt('admin123'),
        'remember_token' => str_random(10),
    ];

    return [
         'name' => 'hikmatullah saqib',
         'email' => 'hsaqibsz@gmail.com',
         'admin' => 1, 
         'password' => bcrypt('saqib'),
         'remember_token' => str_random(10),
    ];
});
