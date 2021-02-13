<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Models\Supply\EquipmentProperty;
use Faker\Generator as Faker;
use \App\Models\Supply\Equipment;

$factory->define(EquipmentProperty::class, function (Faker $faker) {
    return [
        'code' => $faker->randomNumber(5),
        'eq_properties_title' => $faker->title,
        'equipment_id' => factory(Equipment::class)->create()->id,
    ];
});
