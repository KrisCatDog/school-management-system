<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    $user = factory('App\User')->create();

    $user->update(['role_id' => 2]);

    return [
        'user_id' => $user->id,
        'photo' => 'uploads/students/default.png',
        'address' => $faker->address,
        'class_id' => rand(1, 33),
    ];
});
