<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderItem;
use App\Product;
use Faker\Generator as Faker;

$factory->define(OrderItem::class, function (Faker $faker) {
    $product = Product::inRandomOrder()->first();
    $quantity = $faker->numberBetween(1,5);
    return [
        'product_title' => $product->title,
        'price' => $product->price,
        'quantity' => $quantity,
        'admin_revenue' => 0.9 * $product->price * $quantity,
        'ambassador_revenue' => 0.1 * $product->price * $quantity,
    ];
});
