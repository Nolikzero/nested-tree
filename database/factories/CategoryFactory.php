<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {
    $randCategory = Category::inRandomOrder()->first();
    return [
        'name' => $faker->city,
        'parent_id' => $randCategory ? $randCategory->id : null,
    ];
});
