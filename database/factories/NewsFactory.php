<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'content' => $faker->sentence(500),
        'user_id' => factory(App\User::class)
    ];
});
