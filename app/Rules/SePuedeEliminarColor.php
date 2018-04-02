<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class SePuedeEliminarColor implements Rule
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
  public function passes($attribute, $color_id){
    return DB::table('articulos')->where('color_id', $color_id)->get()->isEmpty();
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message(){
      return 'No se puede eliminar el color porque esta siendo utilizada en los articulos.';
  }
}
