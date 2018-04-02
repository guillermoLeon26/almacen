<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class SePuedeActualizarColor implements Rule
{
  private $producto_id;
  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public function __construct($producto_id){
    $this->producto_id = $producto_id;
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param  string  $attribute
   * @param  mixed  $value
   * @return bool
   */
  public function passes($attribute, $value){
    $colores = Producto::findOrfail($this->producto_id)->colores()->distinct()->get()->pluck('id')->all();
    $coloresEliminar = array_diff($colores, $value);
    $articulos = DB::table('articulos')->where('producto_id', '=', $this->producto_id)
                                       ->whereIn('color_id', $coloresEliminar)
                                       ->get()
                                       ->pluck('id')
                                       ->all();

    return DB::table('bodega_artidulo')->whereIn('articulos_id', $articulos)->get()->isEmpty();
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message(){
    return 'No se puede eliminar los colores porque ya se encuentra registrado en la bodega.';
  }
}
