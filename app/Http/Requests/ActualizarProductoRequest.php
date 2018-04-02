<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\SePuedeActualizarColor;
use App\Rules\SePuedeActualizarDimension;

class ActualizarProductoRequest extends FormRequest
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
      'producto_id'             =>  'required|numeric',
      'categorias'              =>  'required|array',
      'categorias.*'            =>  'numeric',
      'producto'                =>  'required|array|max:5',
      'producto.codigo'         =>  'required|max:45',
      'producto.marca'          =>  'required|max:45',
      'producto.unidades'       =>  'required|max:45',
      'producto.simbolo'        =>  'required|max:45',
      'producto.descripcion'    =>  'required',
      'colores'                 =>  [
                                      'required',
                                      'array',
                                      new SePuedeActualizarColor($this->producto_id)
                                    ],
      'colores.*'               =>  'numeric',
      'colores_nuevos'          =>  'array',
      'colores_nuevos.*'        =>  'numeric',
      'dimensiones_actuales'    =>  [
                                      'required',
                                      'array',
                                      new SePuedeActualizarDimension($this->producto_id)
                                    ],
      'dimensiones_nuevas'      =>  'array',
    ];
  }
}
