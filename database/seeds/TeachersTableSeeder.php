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
        factory('App\Teacher', 10)->create();

        $subjects = App\Subject::all();
        $classes = App\MyClass::all();

        App\Teacher::all()->each(function ($teacher) use ($subjects) {
            $teacher->subjects()->attach(
                $subjects->random(rand(1, $subjects->count()))->pluck('id')->toArray()
            );
        });

        App\Teacher::all()->each(function ($teacher) use ($classes) {
            $teacher->classes()->attach(
                $classes->random(rand(1, $classes->count()))->pluck('id')->toArray()
            );
        });
    }
}
