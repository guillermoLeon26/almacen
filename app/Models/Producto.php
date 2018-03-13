<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\DescripcionProducto;
use App\Models\ColorProducto;

class Producto extends Model
{
  public $timestamps = false;
  protected $fillable = ['codigo', 'marca', 'descripcion', 'unidades', 'simbolo'];

  //------------------------------------RELACIONES----------------------------------
  public function categorias(){
    return $this->belongsToMany('App\Models\Categoria', 'producto_categoria');
  }

  public function colores(){
    return $this->hasMany('App\Models\ColorProducto');
  }

  public function imagenes(){
    return $this->hasMany('App\Models\Imagen');
  }

  public function descripciones(){
    return $this->hasMany('App\Models\DescripcionProducto');
  }

  //------------------------------------ALCANCES----------------------------------
  public function scopeBuscar($query, $buscar){
    return $query->where('codigo', 'like', '%'.$buscar.'%')
                 ->orWhere('marca', 'like', '%'.$buscar.'%')
                 ->orWhere('categoria', 'like', '%'.$buscar.'%');
  }

  //--------------------------------------METODOS-----------------------------------
  //-------------------------------FUNCIONES GUARDAR PRODUCTO-----------------------
  /*******************************************************************************
    * Funcion para guardar el producto
    * @in producto, categorias, colores, dimensiones
    * @out
    *********************************************************************************/
  public static function guardar($datos){
    $producto = new Producto($datos['producto']);
    $producto->categoria = $producto->srtCategoria($datos['categorias']);
    $producto->save();
    $producto->categorias()->attach($datos['categorias']);
    $producto->colores()->saveMany($producto->arrColores($datos));
    $producto->descripciones()->saveMany($producto->arrDimensiones($datos));
  }

  /*******************************************************************************
    * Funcion para generar un arrego de Colores
    * @in $datos[array]
    * @out array
    *********************************************************************************/
  public function arrColores($datos){
    $colores = $datos['colores'];
    $arr = [];

    foreach ($colores as $color) {
      array_push($arr, new ColorProducto(['color' => $color]));
    }

    return $arr;
  }

  /*******************************************************************************
    * Funcion para generar un arrego de Dimensiones
    * @in array
    * @out array
    *********************************************************************************/
  public function arrDimensiones($datos){
    $dimensiones = $datos['dimensiones'];
    $arr = [];
    
    foreach ($dimensiones as $n => $dimension) {
      array_push($arr, new DescripcionProducto(['n_orden' => $n+1, 'dimension' => $dimension]));
    }

    return $arr;
  }

  /*******************************************************************************
    * Genera un string de las categorias del producto
    * @in Array ids
    * @out String
    *********************************************************************************/
  public function srtCategoria($ArrCategorias){
    $cat = '';

    foreach ($ArrCategorias as $categoria => $id) {
        $cat .= Categoria::find($id)->categoria.' ';
    }

    return $cat;
  }
  //-----------------------------------------------------------------------------------
}
