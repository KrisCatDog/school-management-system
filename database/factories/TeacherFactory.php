<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Teacher;
use Faker\Generator as Faker;

$factory->define(Teacher::class, function (Faker $faker) {
    $user = factory('App\User')->create();

    $user->update(['role_id' => 3]);

    return [
        'user_id' => $user->id,
        'address' => $faker->address,
    ];
});
