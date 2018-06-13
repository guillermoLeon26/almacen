<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrecioRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize(){
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules(){
    return [
      'dimensiones'                           =>  'required|array',
      'dimensiones.*'                         =>  'numeric',
      
      'precio'                                =>  'required|array',
      'precio.costo'                          =>  'required|numeric',
      'precio.ganancia_por_menor'             =>  'required_with:ganancia_por_menor|numeric',
      'precio.porcentaje_ganancia_por_menor'  =>  'required_with:ganancia_por_menor|numeric',
      'precio.descuento_por_menor'            =>  'required_with:ganancia_por_menor|numeric',
      'precio.porcentaje_descuento_por_menor' =>  'required_with:ganancia_por_menor|numeric',
      'precio.precio_por_menor_inc_iva'       =>  'required_with:ganancia_por_menor|numeric',

      'precio.ganancia_por_mayor'             =>  'required_with:ganancia_por_mayor|numeric',
      'precio.porcentaje_ganancia_por_mayor'  =>  'required_with:ganancia_por_mayor|numeric',
      'precio.descuento_por_mayor'            =>  'required_with:ganancia_por_mayor|numeric',
      'precio.porcenaje_descuento_por_mayor'  =>  'required_with:ganancia_por_mayor|numeric',
      'precio.precio_por_mayor_inc_iva'       =>  'required_with:ganancia_por_mayor|numeric'
    ];
  }
}
