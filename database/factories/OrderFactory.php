<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Link;
use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $link = Link::inRandomOrder()->first();

    return [
        'code' => $link->code,
        'user_id' => $link->user_id,
        'ambassador_email' => $link->user->email,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'complete' => 1
    ];
});
