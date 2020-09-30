<?php

use App\General\General;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

$userIds = App\User::where('role', 4)->pluck('id')->toArray();

$factory->define(App\Models\Course::class, function (Faker $faker) use ($userIds) {

    $title = $faker->text(40);
    $url = General::UrlSlug($title);

//    Upload Cover Images
    $newImagePath = General::FactoryUniqueFileName('public', 'cover_images/mycoverimage', 'jpg');
    $isFile = Storage::disk('public')->copy('cover_images/mycoverimage.jpg', $newImagePath);
    if(!$isFile){
        exit();
    }

    //    Upload Assignment
    $audience = array_random([1, 2, 3]);
    $storagePath = General::getFilePath($audience);

    $newAssignmentPath = General::FactoryUniqueFileName('local', $storagePath.'/assignments/assignment', 'pdf');
    $isAssignmentFile = Storage::disk('local')->copy('Assignment-sample.pdf', $newAssignmentPath);
//dd($newAssignmentPath);

    $Paragraphs = $faker->paragraph(rand(3,8)).
        PHP_EOL.PHP_EOL.$faker->paragraph(rand(5,10)).
        PHP_EOL.PHP_EOL.$faker->paragraph(rand(5,10));

    return [
        'users_id' => $faker->randomElement($userIds),
        'title' => $title,
        'audience' => $audience,
        'note' => $Paragraphs,
        'cover_image' => $newImagePath,
        'video' => 'https://www.youtube.com/embed/YpdzRUz6O0E',
        'duration' => rand(1, 10).' '.array_random(['Day(s)', 'Week(s)', 'Month(s)']),
        'assignment_note' => $Paragraphs,
        'assignment_doc' => $newAssignmentPath ?? null,
        'url' => $url
    ];
});

$factory->afterCreating(App\Models\Course::class, function ($Course, $faker) {
    $audience = General::getAudienceId($Course->audience);
    $n = rand(1,3);
    for($i = 0; $i <= $n; $i++){
        factory(App\Models\Library::class)->create(
        [
            'user_id' => $Course->users_id,
            'course_id' => $Course->id,
            'audience' => null,
            'file' => function () use ($audience) {
                $storagePath = General::getFilePath($audience);
                $newLibraryPath = General::FactoryUniqueFileName('local', $storagePath.'/library/Library_file', 'pdf');
                $isAssignmentFile = Storage::disk('local')->copy('library-sample.pdf', $newLibraryPath);
                return $newLibraryPath;
            }
        ]
        );
    }
});
