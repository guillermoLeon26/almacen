<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Marca;
use App\Models\Producto;

class SePedeEliminarMarca implements Rule
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
  public function passes($attribute, $marca_id){
    $marca = Marca::findOrFail($marca_id)->marca;

    return Producto::where('marca', $marca)->get()->isEmpty();
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message(){
      return 'No se puede eliminar la marca porque se encuentra asociada a un producto.';
  }
}
