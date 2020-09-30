<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        goto a;
//        factory(App\Models\Student::class, 10)->create();
        for ($i =0; $i < 7; $i++){
            factory(App\Models\Student::class)->create();
            factory(App\Models\Artisan::class)->create();
            factory(App\Models\Employee::class)->create();
            if($i>2){
                continue;
            }
            factory(App\Models\Admin::class)->create();
        }
        a:
        //Seed the Business category table
        $business = ['Production', 'Service',
                    'Buying and Selling', 'Agriculture',
                    'Construction', 'Mining'];
        foreach ($business as $value){
            \App\Models\BusinessCategory::create([
                'name' => $value
            ]);
        }

        exit;

//        factory(App\Models\Course::class, 5)->create();
//        a:
        factory(App\Models\Library::class, 3)->create();
        factory(App\Models\Lesson::class, 20)->create();
    }
}
