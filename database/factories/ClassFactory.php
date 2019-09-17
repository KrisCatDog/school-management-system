<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MyClass;
use Faker\Generator as Faker;

$factory->define(MyClass::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement([
            'X RPL 1',
            'XI RPL 1',
            'XII RPL 1',
            'X RPL 2',
            'XI RPL 2',
            'XII RPL 2', // 6

            'X TKJ 1',
            'XI TKJ 1',
            'XII TKJ 1',
            'X TKJ 2',
            'XI TKJ 2',
            'XII TKJ 2',
            'X TKJ 3',
            'XI TKJ 3',
            'XII TKJ 3', // 15

            'X AK 1',
            'XI AK 1',
            'XII AK 1',
            'X AK 2',
            'XI AK 2',
            'XII AK 2',
            'X AK 3',
            'XI AK 3',
            'XII AK 3',
            'X AK 4',
            'XI AK 4',
            'XII AK 4',
            'X AK 5',
            'XI AK 5',
            'XII AK 5',
            'X AK 6',
            'XI AK 6',
            'XII AK 6', // 33 
        ]),
    ];
});
