<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */



use App\ecomm;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(ecomm::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'details' => $faker->paragraph,
        // 'details' => $faker->sentence($nbWords = 15, $variableNbWords = true),
        'price' => $faker->randomDigit,
        'description' =>$faker->paragraph

    ];
});
