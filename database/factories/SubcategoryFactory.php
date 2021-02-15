<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Subcategory;
use Faker\Generator as Faker;


$factory->define(Subcategory::class, function (Faker $faker) {
    return [
        'categories_id' => factory(Categories::class),
        'nombre' => $faker->text,
        'foto' => $faker->optional()->text,
        'descripcion' => $faker->optional()->text,
    ];
});
