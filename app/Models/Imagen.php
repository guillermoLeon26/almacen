<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image;

class Imagen extends Model
{
  protected $table = 'imagenes';
  protected $fillable = ['producto_id', 'colores_id'];
  public $timestamps = false;

  //------------------------------------RELACIONES----------------------------------
  public function producto(){
    return $this->belongsTo('App\Models\Producto'); 
  }

  //--------------------------------------METODOS-----------------------------------
  /**
   * Funcion que sirve para guardar una imagen de un producto
   * @in $request
   * @return 
   */
  public static function guardar($request){
    $image = Image::make($request->file('imagen'));

    $image->resize(420, null, function ($c){
      $c->aspectRatio();
      $c->upsize();
    });

    $imagen = new Imagen($request->all());
    $imagen->n_orden = $imagen->numeroDeOrden();
    $imagen->imagen = (String) $image->encode('data-url');
    //$imagen->save();
    dd($imagen);
  }

  /**
   * Devuelve el valor de numero de orden que se debe ingresar.
   *
   * @return int
   */
  public function numeroDeOrden(){
    $imagenes = $this->producto->imagenes;

    return ($imagenes->count() == 0)?1:array_get($imagenes->last(), 'n_orden')+1;
  }
}
