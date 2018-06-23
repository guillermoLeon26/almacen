<?php

use Illuminate\Database\Seeder;

class ProveedorTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){
    factory(App\Models\Proveedor::class, 1)->create()->each(function ($proveedor){
      for ($i=0; $i < 20; $i++) { 
        $proveedor->contactos()->save(factory(App\Models\Contacto::class)->make());
      }
    });
  }
}
