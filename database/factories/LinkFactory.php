<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Link;
use App\User;
use Faker\Generator as Faker;

$factory->define(Link::class, function (Faker $faker) {
    return [
        'code' => $faker->slug,
        'user_id'=> User::inRandomOrder()->first()->id
    ];
});
