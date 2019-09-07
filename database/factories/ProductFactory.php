<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
  $categoryArray = ['beverage', 'food', 'other'];
  return [
    'name' => $faker->words(1,true),
    'category' => $categoryArray[$faker->randomDigit % 3],
    'price' => $faker->randomDigit,
    'display' => true
  ];
});
