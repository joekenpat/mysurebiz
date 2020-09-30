<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Employee::class, function (Faker $faker) {
    return [
        'users_id' => function () {
            return factory(App\User::class)->create(['role' => 3])->id;
        },
        'name_of_job' => $faker->name.array_random([' Production', ' Company', ' limited', ' plc']),
        'position_at_job' => array_random(['manager', 'seller', 'Secretary', 'Engineer', 'Specialist']),
        'penny_wise' => random_int(1, 10).'0000',
        'existing_business' => random_int(1, 10).'0000',
        'period' => array_random([6,12,18,24,30,36])
    ];
});
