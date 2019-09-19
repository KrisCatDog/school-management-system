<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Teacher', 15)->create();

        $subjects = App\Subject::all();

        App\Teacher::all()->each(function ($teacher) use ($subjects) {
            $teacher->subjects()->attach(
                $subjects->random(rand(1, $subjects->count()))->pluck('id')->toArray()
            );
            // $teacher->subjects()->saveMany($subjects);
        });
    }
}
