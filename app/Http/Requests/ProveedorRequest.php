<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\unico;

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
    $id = isset($this->id)?$this->id:null;
    
    return [
      'empresa'   =>  [
                        'required',
                        'string',
                        'max:45',
                        new unico('proveedor', 'empresa', $id)
                      ],
      'telefono'  =>  'string|max:45|nullable',
      'correo'    =>  'email|nullable',
      'direccion' =>  'string|nullable',
      'ciudad'    =>  'string|max:45|nullable',
      'provincia' =>  'string|max:45|nullable',
      'pais'      =>  'string|max:45|nullable'
    ];
  }
}
