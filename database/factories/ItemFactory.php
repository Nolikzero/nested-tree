<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(App\Item::class, function (Faker $faker) {
    $randCategory = Category::inRandomOrder()->firstOrFail();
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'image' => $faker->image(\App\Services\ItemService::getUploadDir(), 640, 480, null, false),
        'category_id' => $randCategory->id
    ];
});
