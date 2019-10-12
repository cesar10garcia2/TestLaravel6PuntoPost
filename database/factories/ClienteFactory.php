<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use App\User;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'user_creacion_id' => function () {
            return factory(User::class)->create()->id;
        },
        'tipo_documento_id' => 1,
        'nombre' => $nombre = $faker->firstName,
        'apellido' => $apellido = $faker->lastName,
        'nombre_completo' => $nombre . ' ' . $apellido,
        'celular' => $faker->e164PhoneNumber,
        'documento_identidad' => $faker->unixTime($max = 'now'),
        'empresa' => $faker->company,
        'direccion_fiscal' => $faker->address,
        'direccion_cobranza' => $faker->address

    ];
});
