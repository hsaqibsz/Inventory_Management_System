<?php

use Faker\Generator as Faker;

$factory->define(App\Setting::class, function (Faker $faker) {
    return [
        "site_name" => "WahdatShop",
        "site_email" =>"hedayatullah@gmail.com",
        "site_phone" =>"+93 782 003 048", 
        "site_address" => "Ghazni, Afghan Market, Second floor",
        "site_facebook" =>"https://www.facebook.com/hedayatullahwahdat",
        "site_youtube"  =>"https://www.youtube.com/hedayatullahwahdat",
        "site_twitter"  =>"https://www.twitter.com/hedayatullahwahdat",
        "site_about"   => $faker->sentence(10)
    ];
});
