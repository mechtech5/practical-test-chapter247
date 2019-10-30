<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
      'invoice_number' => 'ABC',
      'total_amount' => 0,
      'status' => $faker->randomElement($array = array ('new','processed'))
    ];
});
