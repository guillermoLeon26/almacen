<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class SePuedeActualizarDimension implements Rule
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
    $dimenciones = Producto::findOrFail($this->producto_id)->descripciones()
                                                           ->distinct()
                                                           ->get()
                                                           ->pluck('id')
                                                           ->all();
    $dimencionesActuales = array_column($value, 'id');
    $dimencionesEliminar = array_diff($dimenciones, $dimencionesActuales);
    
    $articulos = DB::table('articulos')->where('producto_id', '=', $this->producto_id)
                                       ->whereIn('productos_descripcion_id', $dimencionesEliminar)
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
      return 'No se puede eliminar las dimensiones porque ya se encuentran registradas en bodega.';
  }
}
