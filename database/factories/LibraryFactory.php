<?php

use App\General\General;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

$userIds = App\User::where('role', 4)->pluck('id')->toArray();

$factory->define(App\Models\Library::class, function (Faker $faker) use ($userIds) {

    $audience = array_random([1, 2, 3]);

    return [
        'user_id' => $faker->randomElement($userIds),
        'course_id' => null,
        'lesson_id' => null,
        'audience' => $audience,
        'file' => function () use ($audience) {
            $storagePath = General::getFilePath($audience);
            $newLibraryPath = General::FactoryUniqueFileName('local', $storagePath.'/library/Library_file', 'pdf');
            $isAssignmentFile = Storage::disk('local')->copy('library-sample.pdf', $newLibraryPath);
            return $newLibraryPath;
        }
    ];
});
