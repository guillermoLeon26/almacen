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

  //------------------------------RELACIONES--------------------------------
  public function contactos(){
    return $this->hasMany('App\Models\Contacto');
  }

  public function productos(){
    return $this->hasMany('App\Models\ProductosProveedor');
  }

  public function compras(){
    return $this->hasMany('App\Models\Compra');
  }

  //--------------------------------METODOS----------------------------------
  public function eliminar(){
    $this->contactos()->delete();
    $this->productos()->delete();
    $this->delete();
  }
}
