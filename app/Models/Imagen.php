<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Color;
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
    $imagen->save();
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

  /**
   * Devuelve el color de la imagen del produto.
   *
   * @return string
   */
  public function color(){
    return Color::findOrFail($this->colores_id)->color;
  }

  /**
   * Actualiza el numero de orden de la imagen.
   *
   * @param string $mover (subir o bajar)
   * @return
   */
  public function actualizarNumeroDeOrden($mover){
    if ($mover === 'arriba') 
      $this->moverArriba();
    else 
      $this->moverAbajo();
  }

  public function moverArriba(){
    $imagenes = $this->producto->imagenes()->orderBy('n_orden')->get();
    $imagenUltima = $imagenes->last();
    $n_ordenImagenActual = $this->n_orden;

    if ($this->id !== $imagenUltima->id) {
      $ubicacionImagenActual = $imagenes->search(function ($imagen, $key){
                                return $imagen->id == $this->id;
                               });
      $imagenSiguiente = $imagenes[$ubicacionImagenActual+1];
      $n_ordenImagenSiguiente = $imagenSiguiente->n_orden;

      $imagenSiguiente->n_orden = $n_ordenImagenActual;
      $this->n_orden = $n_ordenImagenSiguiente;

      $imagenSiguiente->save();
      $this->save();
    }
  }

  public function moverAbajo(){
    $imagenes = $this->producto->imagenes()->orderBy('n_orden')->get();
    $imagenPrimera = $imagenes->first();
    $n_ordenImagenActual = $this->n_orden;

    if ($this->id !== $imagenPrimera->id) {
      $ubicacionImagenActual = $imagenes->search(function ($imagen, $key){
                                return $imagen->id == $this->id;
                               });
      $imagenAnterior = $imagenes[$ubicacionImagenActual-1];
      $n_ordenImagenAnterior = $imagenAnterior->n_orden;

      $imagenAnterior->n_orden = $n_ordenImagenActual;
      $this->n_orden = $n_ordenImagenAnterior;

      $imagenAnterior->save();
      $this->save();
    }
  }
}
