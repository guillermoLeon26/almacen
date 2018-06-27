<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactosRequest extends FormRequest
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
      'proveedor_id'  =>  'required|numeric',
      'nombre'        =>  'required|string|max:45',
      'telefono'      =>  'required|string|max:45',
      'celular'       =>  'required|string|max:45',
      'correo'        =>  'required|string|max:45',
      'cargo'         =>  'required|string|max:45'
    ];
  }
}
