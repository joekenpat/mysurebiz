<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Student::class, function (Faker $faker) {
    return [
        'users_id' => function () {
            return factory(App\User::class)->create(['role' => 1])->id;
        },
        'name_of_school' => $faker->name.' University',
        'state_of_school' => $faker->state,
        'level' => random_int(1, 6).'00',
        'course' => array_random(['Mass communication', 'Engineering', 'Information Technology']),
        'pennywise_category' => array_random(['Premiun', 'Amicable']),
        'parent_guardian_phone' => $faker->phoneNumber,
    ];
});
