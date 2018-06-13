<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class SePuedeEliminarBodega implements Rule
{
  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public function __construct(){
    //
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param  string  $attribute
   * @param  mixed  $value
   * @return bool
   */
  public function passes($attribute, $bodega_id){
    return DB::table('bodega_artidulo')->where('bodega_id', $bodega_id)->get()->isEmpty();
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message(){
      return 'No se puede eliminar la bodega porque contiene articulos.';
  }
}
