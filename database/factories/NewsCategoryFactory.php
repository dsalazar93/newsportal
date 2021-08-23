<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NewsCategory;
use Faker\Generator as Faker;

$factory->define(NewsCategory::class, function (Faker $faker) {
    return [
        'news_id' => factory(App\News::class),
        'category_id' => random_int(1,6)
    ];
});
