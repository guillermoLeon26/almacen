<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
  protected $table = 'bodegas';
  public $timestamps = false;
  protected $fillable = ['nombre', 'direccion'];

  //------------------------------ALCANCES---------------------------------
  public function scopeBuscar($query, $buscar){
    return $query->where('ciudad', 'like', '%'.$buscar.'%');
  }

  //-----------------------------RELACIONES---------------------------------
  public function ciudades(){
    return $this->belongsToMany('App\Models\Ciudad');
  }

  //-------------------------------METODOS--------------------------------
  /**
   * Crea una nueva bodega.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return 
   */
  public static function guardar($request){
    $bodega = Bodega::create($request->all());
    $bodega->ciudades()->attach($request->ciudad_id);
  }

  /**
   * Devuelve la ciudad en donde se encuentra la bodega.
   *
   * @param  
   * @return string
   */
  public function ciudad(){
    return $this->ciudades->first()->ciudad;
  }
}
