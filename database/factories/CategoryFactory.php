<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;


$factory->define(Category::class, function (Faker $faker) {
    return [
        'nombre' => $faker->text,
        'foto' => $faker->text,
        'descripcion' => $faker->optional()->text,
        'estado' => $faker->randomDigit,
    ];
});
