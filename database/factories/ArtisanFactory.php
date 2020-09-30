<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Artisan::class, function (Faker $faker) {
    return [
        'users_id' => function () {
            return factory(App\User::class)->create(['role' => 2])->id;
        },
        'trade' => array_random(['agriculture', 'production', 'Iot']),
        'trade_acquisition_period' => random_int(1,10),
        'daily_penny_wise' => random_int(2, 10).'00'
    ];
});
