<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
  protected $table = 'proveedor';
  public $timestamps = false;
  protected $fillable = [
                          'empresa',
                          'telefono',
                          'correo',
                          'direccion',
                          'ciudad',
                          'provincia',
                          'pais'
                        ];

  //-------------------------------ALCANCES---------------------------------
  public function scopeBuscar($query, $buscar){
    return $query->where('empresa', 'like', '%'.$buscar.'%');
  }
}
