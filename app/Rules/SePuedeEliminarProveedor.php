<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Proveedor;

class SePuedeEliminarProveedor implements Rule
{
  private $proveedor;
  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public function __construct($proveedor){
    $this->proveedor = $proveedor;
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param  string  $attribute
   * @param  mixed  $value
   * @return bool
   */
  public function passes($attribute, $proveedor_id){
    return $this->proveedor->compras->isEmpty();
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message(){
      return 'No se puede eliminar el proveedor porque tiene compras asociadas';
  }
}
