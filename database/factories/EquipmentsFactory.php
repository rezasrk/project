<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use \App\Models\Supply\Equipment;
use \App\Models\Supply\Category;

$factory->define(Equipment::class, function (Faker $faker) {
    return [
        'equipment_title' => $faker->title,
        'category_id' => factory(Category::class)->create()->id,
    ];
});
