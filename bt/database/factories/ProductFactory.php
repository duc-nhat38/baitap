<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->realText($maxNbChars = 20, $indexSize = 2),
        'price' => $faker->randomDigitNotNull,
        'view_count' => 0,
        'image' => $faker->imageUrl($width = 300, $height = 300) 
    ];
});
