<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class unico implements Rule
{
  private $tabla;
  private $campo;
  private $id;
  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public function __construct($tabla, $campo, $id=null){
    $this->tabla = $tabla;
    $this->campo = $campo;
    $this->id = $id;
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param  string  $attribute
   * @param  mixed  $value
   * @return bool
   */
  public function passes($attribute, $value){
    if (is_null($this->id)) {
      $cont = DB::table($this->tabla)->where($this->campo, '=', $value)->get()->count();

      return $cont <= 0;
    } else {
      $id = DB::table($this->tabla)->where($this->campo, '=', $value)->get()->first()->id;

      return $id == $this->id;
    }
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message(){
    return 'Se encuentra repedito el campo ' . $this->campo;
  }
}
