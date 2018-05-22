<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DescripcionProducto extends Model
{
  protected $table = 'productos_descripcion';
  public $timestamps = false;
  protected $fillable = [
                          'n_orden', 
                          'dimension',
                          'costo',
                          'ganancia_por_menor',
                          'porcentaje_ganancia_por_menor',
                          'descuento_por_menor',
                          'porcentaje_descuento_por_menor',
                          'precio_por_menor_inc_iva',
                          'ganancia_por_mayor',
                          'porcentaje_ganancia_por_mayor',
                          'descuento_por_mayor',
                          'porcenaje_descuento_por_mayor',
                          'precio_por_mayor_inc_iva'
                        ];

  //-------------------------------METODOS------------------------------
  /**
   * Actualiza el precio de la descripcion de los productos.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return
   */
  public static function actualizarPrecios($request){
    foreach ($request->dimensiones as $dimension => $id) {
      $descripcion = DescripcionProducto::findOrFail($id);
      $descripcion->fill($request->precio);
      $descripcion->save();
    }
  }
}
