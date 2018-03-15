<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
        'categorias'            =>  'required|array',
        'categorias.*'          =>  'numeric',
        'producto'              =>  'required|array|max:5',
        'producto.codigo'       =>  'required|max:45',
        'producto.marca'        =>  'required|max:45',
        'producto.unidades'     =>  'required|max:45',
        'producto.simbolo'      =>  'required|max:45',
        'producto.descripcion'  =>  'required',
        'colores'               =>  'required|array',
        'dimensiones'           =>  'required|array',
      ];
    }
}
