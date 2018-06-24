<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ProductosProveedor::class, function (Faker $faker) {
  return [
    'marca'       =>  $faker->word,
    'descripcion' =>  $faker->text($maxNbChars = 200)
  ];
});
