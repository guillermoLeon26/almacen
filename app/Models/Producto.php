<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\DescripcionProducto;
use App\Models\Color;
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

  public function descripciones(){
    return $this->belongsToMany('App\Models\DescripcionProducto', 'articulos','producto_id','productos_descripcion_id');
  }

  //------------------------------------ALCANCES----------------------------------
  public function scopeBuscar($query, $buscar){
    return $query->where('codigo', 'like', '%'.$buscar.'%')
                 ->orWhere('marca', 'like', '%'.$buscar.'%')
                 ->orWhere('categoria', 'like', '%'.$buscar.'%');
  }

  //--------------------------------------METODOS-----------------------------------
  /*******************************************************************************
    * Lista de descripciones 
    * @in 
    * @out Collection[descripcipon]
    *********************************************************************************/
  public function listaDescripciones(){
    return $this->descripciones()->distinct()->get()->sortBy('n_orden');
  }
  //***********************************************************************************
  //-------------------------------FUNCIONES GUARDAR PRODUCTO--------------------------
  //***********************************************************************************
  /**********************************************************************************
    * Funcion para guardar el producto
    * @in producto, categorias, colores, dimensiones
    * @out
    *********************************************************************************/
  public static function guardar($datos){
    $producto = new Producto($datos['producto']);
    $producto->categoria = $producto->srtCategoria($datos['categorias']);
    $producto->save();
    $producto->categorias()->attach($datos['categorias']);
    $idsDimensiones = $producto->arrDimensiones($datos);
    $articulos = $producto->arrArticulos($datos['colores'], $idsDimensiones, $producto->id);
    DB::table('articulos')->insert($articulos);
  }

  /*******************************************************************************
    * Funcion para generar un arrego de Articulos
    * @in $datos[array]
    * @out array
    *********************************************************************************/
  public function arrArticulos($idsColores, $idsDimensiones, $idProducto){
    $array = array();
    foreach ($idsColores as $idColor) {
      foreach ($idsDimensiones as $idDimension) {
        array_push($array, [
          'producto_id'               =>  $idProducto,
          'productos_descripcion_id'  =>  $idDimension,
          'color_id'                  =>  $idColor
        ]);
      }
    }

    return $array;
  }

  /*******************************************************************************
    * Funcion para generar un arrego de Dimensiones y guarda la Dimension
    * @in array
    * @out array
    *********************************************************************************/
  public function arrDimensiones($datos){
    $dimensiones = $datos['dimensiones'];
    $arr = [];
    
    foreach ($dimensiones as $n => $dimension) {
      $dimension = DescripcionProducto::create(['n_orden' => $n+1, 'dimension' => $dimension]);
      array_push($arr, $dimension->id);
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
  
  //***********************************************************************************
  //-------------------------------FUNCIONES ACTUALIZAR PRODUCTO-----------------------
  //***********************************************************************************
  public function actualizar($datos){
    $this->fill($datos['producto']);
    $this->categoria = $this->srtCategoria($datos['categorias']);
    $this->save();
    $this->categorias()->sync($datos['categorias']);
    $this->colores()->sync($datos['colores']);
  }
  /*******************************************************************************
    * Genera un string de las categorias del producto
    * @in Array ids
    * @out String
  *********************************************************************************/
  protected function syncDescripciones(){
    # code...
  }
}
