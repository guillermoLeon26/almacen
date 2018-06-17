<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
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
      'empresa'   =>  'required|string|max:45',
      'telefono'  =>  'string|max:45',
      'correo'    =>  'email',
      'direccion' =>  'string',
      'ciudad'    =>  'string|max:45',
      'provincia' =>  'string|max:45',
      'pais'      =>  'string|max:45'
    ];
  }
}
