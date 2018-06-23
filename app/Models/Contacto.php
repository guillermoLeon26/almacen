<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
  protected $table = 'contactos';
  public $timestamps = false;
  protected $fillable = ['nombre', 'telefono', 'celular', 'correo', 'cargo', 'proveedor_id'];

  //----------------------------RELACIONES-----------------------------------
  public function proveedor(){
  	return $this->belongsTo('App\Models\Proveedor');
  }

  //-----------------------------ALCANCES------------------------------------
  public function scopeBuscar($query, $buscar){
    return $query->where('nombre', 'like', '%'.$buscar.'%');
  }
}
