<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class SePuedeEliminarProducto implements Rule
{
  private $producto;
  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public function __construct($producto){
    $this->producto = $producto;
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param  string  $attribute
   * @param  mixed  $value
   * @return bool
   */
  public function passes($attribute, $value){
    $articulos = $this->producto->articulos->pluck('id')->all();
    
    return DB::table('bodega_artidulo')->whereIn('articulos_id', $articulos)->get()->isEmpty();
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message()
  {
    return 'No se puede eliminar el articulo porque ya esta registrado en las bodegas.';
  }
}
