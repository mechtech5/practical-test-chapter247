<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
      'name' => $faker->word,
      'price' => $faker->numberBetween($min = 100, $max = 1000),
      'in_stock' => $faker->boolean($chanceOfGettingTrue = 50) // true
    ];
});
