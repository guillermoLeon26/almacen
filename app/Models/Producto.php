<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\DescripcionProducto;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
  public $timestamps = false;
  protected $fillable = ['codigo', 'marca', 'descripcion', 'unidades', 'simbolo'];

  //------------------------------------RELACIONES----------------------------------
  public function categorias(){
    return $this->belongsToMany('App\Models\Categoria', 'producto_categoria');
  }

  public function colores(){
    return $this->belongsToMany('App\Models\Color', 'articulos');
  }

  public function imagenes(){
    return $this->hasMany('App\Models\Imagen');
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
    $idsDimensiones = $producto->guardarDimensiones($datos);
    DB::table('articulos')->insert($producto->arrArticulos($producto->id, $datos, $idsDimensiones));
  }

  /*******************************************************************************
    * Funcion para generar un arrego de articulos
    * @in $producto[array], $datos[array], $idsDimensiones[array]
    * @out array
    *********************************************************************************/
  public function arrArticulos($productoId, $datos, $idsDimensiones){
    $colores = $datos['colores'];
    $arr = [];

    foreach ($colores as $color) {
      foreach ($idsDimensiones as $dimension) {
        array_push($arr, [
          'colores_id'                =>  $color,
          'productos_descripcion_id'  =>  $dimension,
          'productos_id'              =>  $productoId,
        ]);
      }
    }

    return $arr;
  }

  /*******************************************************************************
    * Funcion que guarda todos las dimensiones y retorna un array de ids de dimensiones
    * @in array
    * @out array de ids
    *********************************************************************************/
  public function guardarDimensiones($datos){
    $dimensiones = $datos['dimensiones'];
    $ids = [];
    
    foreach ($dimensiones as $id => $dimension) {
      $descripcion = DescripcionProducto::create(['n_orden' => $id+1, 'dimension' => $dimension]);
      array_push($ids, $descripcion->id);
    }

    return $ids;
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
