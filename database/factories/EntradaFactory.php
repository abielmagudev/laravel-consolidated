<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entrada;
use Faker\Generator as Faker;

$factory->define(Entrada::class, function (Faker $faker) {

    $cruce_id   = $faker->boolean ? $faker->numberBetween(1,10) : null;
    $codigor_id = $faker->boolean ? $faker->numberBetween(1,10) : null;

    return [
        // Entrada
        'numero' => $faker->uuid,
        'consolidado_id' => $faker->numberBetween(1,10),
        'cliente_id' => $faker->numberBetween(1,10),
        'cliente_alias_numero' => $faker->boolean ? 1 : 0,

        // Registro
        'registrado_at' => $faker->boolean ? $faker->dateTime() : null,

        // Cruce
        'vehiculo_id' => $cruce_id,
        'conductor_id' => $cruce_id,
        'vuelta' => $cruce_id ? $faker->randomDigit() : null,
        'cruce_fecha' => $cruce_id ? $faker->date() : null,
        'cruce_hora' => $cruce_id ? $faker->time() : null,

        // Reempacado
        'codigor_id' => $codigor_id,
        'reempacador_id' => $codigor_id,
        'reempacado_fecha' => $codigor_id ? $faker->date() : null,
        'reempacado_hora' => $codigor_id ? $faker->time() : null,

        'created_by_user' => $faker->numberBetween(1,10),
        'updated_by_user' => $faker->numberBetween(1,10),
    ];
});
