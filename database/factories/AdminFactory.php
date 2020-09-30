<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Admin::class, function (Faker $faker) {
    return [
        'users_id' => function () {
            return factory(App\User::class)->create(['role' => 4])->id;
        },
        'function' => array_random(['student', 'artisan', 'employee', 'superAdmin']),
    ];
});
