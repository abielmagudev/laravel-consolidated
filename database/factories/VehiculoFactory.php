<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vehiculo;
use Faker\Generator as Faker;

$factory->define(Vehiculo::class, function (Faker $faker) {
    return [
        'alias' => 'Vehiculo - ' . $faker->unique()->randomDigit,
        'descripcion' => $faker->text(),
    ];
});