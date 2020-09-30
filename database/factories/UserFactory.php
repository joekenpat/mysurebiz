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
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'home_address' => $faker->address,
        'dob' => $faker->date(),
        'state_of_origin' => $faker->state,
        'phone' => $faker->phoneNumber,
        'name_next_of_kin' => $faker->name,
        'phone_next_of_kin' => $faker->phoneNumber,
        'state_next_of_kin' => $faker->state,
        'bussiness_category' => array_random(['Production', 'Service', 'Buying & Selling', 'Agriculture', 'Construction', 'Mining']),
        'business_of_interest' => array_random(['Production', 'Service', 'Buying & Selling', 'Agriculture', 'Construction', 'Mining']),
        'resident_state' => $faker->state,
        'gender' => array_random(['male', 'female']),
        'image' => array_random(['face1.jpg', 'face2.jpg', 'face3.jpg', 'face4.jpg']),
        'status' => array_random([0, 1, 2]),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

//Admins Factory
//$factory->define(App\Models\Admin::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//        'remember_token' => str_random(10),
//    ];
//});
