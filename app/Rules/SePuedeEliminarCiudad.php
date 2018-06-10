<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class SePuedeEliminarCiudad implements Rule
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
  public function passes($attribute, $ciudad_id){
    return DB::table('bodega_ciudad')->where('ciudades_id', $ciudad_id)->get()->isEmpty();
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message(){
    return 'No se puede eliminar la ciudad porque se encuentra asignada a una bodega.';
  }
}
