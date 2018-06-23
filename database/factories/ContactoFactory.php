<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Contacto::class, function (Faker $faker) {
  return [
    'nombre'    =>  $faker->name,
    'telefono'  =>  $faker->tollFreePhoneNumber,
    'celular'   =>  $faker->e164PhoneNumber,
    'correo'    =>  $faker->email,
    'cargo'     =>  $faker->randomElement($array = array ('Vendedor','Asistente','Bodegero'))
  ];
});
