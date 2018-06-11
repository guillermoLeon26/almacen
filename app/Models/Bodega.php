<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ciudad;

class Bodega extends Model
{
  protected $table = 'bodegas';
  public $timestamps = false;
  protected $fillable = ['nombre', 'direccion'];

  //------------------------------ALCANCES---------------------------------
  public function scopeBuscar($query, $buscar){
    return $query->where('slug', 'like', '%'.$buscar.'%');
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
    $ciudad = Ciudad::findOrFail($request->ciudad_id)->ciudad;
    $bodega = new Bodega($request->all());
    $bodega->slug = $request->nombre.' '.$request->direccion.' '.$ciudad;
    $bodega->save();
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
