<?php

use App\General\General;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

$userIds = App\User::where('role', 4)->pluck('id')->toArray();
$Course = App\Models\Course::select('id', 'audience')->get()->toArray();

$factory->define(App\Models\Lesson::class, function (Faker $faker) use ($userIds, $Course) {

    $chosenCourse = $faker->randomElement($Course);

    $audience = General::getAudienceId($chosenCourse['audience']);

    //    Upload Assignment
    $storagePath = General::getFilePath($audience);
    $newAssignmentPath = General::FactoryUniqueFileName('local', $storagePath.'/assignments/assignment', 'pdf');
    $isAssignmentFile = Storage::disk('local')->copy('Assignment-sample.pdf', $newAssignmentPath);

    $Paragraphs = $faker->paragraph(rand(3,8)).
        PHP_EOL.PHP_EOL.$faker->paragraph(rand(5,10)).
        PHP_EOL.PHP_EOL.$faker->paragraph(rand(5,10));

    return [
        'users_id' => $faker->randomElement($userIds),
        'course_id' => $chosenCourse['id'],
        'title' => $title = $faker->text(40),
        'note' => $Paragraphs,
        'video' => 'https://www.youtube.com/embed/YpdzRUz6O0E',
        'assignment_note' => $Paragraphs,
        'assignment_doc' => $newAssignmentPath ?? null
    ];
});


$factory->afterCreating(App\Models\Lesson::class, function ($Lesson, $faker) use ($Course) {
    $index = array_search($Lesson->course_id, array_column($Course, 'id'));
    $audience = General::getAudienceId($Course[$index]['audience']);
    $n = rand(1,3);
    for($i = 0; $i <= $n; $i++){
        factory(App\Models\Library::class)->create(
            [
                'user_id' => $Lesson->users_id,
                'course_id' => $Lesson->course_id,
                'lesson_id' => $Lesson->id,
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