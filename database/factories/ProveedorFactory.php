<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Proveedor::class, function (Faker $faker) {
  return [
    'empresa'   =>  $faker->word,
    'telefono'  =>  $faker->phoneNumber,
    'correo'    =>  $faker->email,
    'direccion' =>  $faker->address,
    'ciudad'    =>  $faker->city,
    'provincia' =>  $faker->state,
    'pais'      =>  $faker->country
  ];
});
