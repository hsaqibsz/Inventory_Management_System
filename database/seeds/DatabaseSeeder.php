<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          //$this->call(UsersTableSeeder::class);
           factory(\App\User::class, 1)->create();
           factory(\App\Category::class, 6)->create();
           factory(\App\Imports::class, 6)->create();
           factory(\App\Customer::class, 6)->create();
           factory(\App\Sales::class, 6)->create();
           factory(\App\Deal::class, 6)->create();
           factory(\App\Setting::class, 1)->create();

    }
}
