<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Supply\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'category_title' => $faker->name,
    ];
});
