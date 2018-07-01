<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\DescripcionProducto;
use App\Models\Color;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class Producto extends Model
{
  public $timestamps = false;
  protected $fillable = ['codigo', 'marca', 'descripcion', 'unidades', 'simbolo'];

  //------------------------------------RELACIONES----------------------------------
  public function articulos(){
    return $this->hasMany('App\Models\Articulo');
  }

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
    * Primera imagen del producto
    * @in 
    * @out imagen
    *********************************************************************************/
  public function imagen(){
    $imagenes = $this->imagenes;

    if ($imagenes->isNotEmpty()) {
      return $imagenes->sortBy('n_orden')->first()->imagen;
    }
  }

  /*******************************************************************************
    * Lista de descripciones 
    * @in 
    * @out Collection[descripcipon]
    *********************************************************************************/
  public function listaDescripciones(){
    return $this->descripciones()->distinct()->get()->sortBy('n_orden');
  }

  /*******************************************************************************
    * Lista de descripciones 
    * @in 
    * @out Collection[descripcipon]
    *********************************************************************************/
  public function listaColores(){
    return $this->colores()->distinct()->get();
  }
  /*******************************************************************************
    * Lista de dimensiones 
    * @in 
    * @out Collection[dimensiones]
    *********************************************************************************/
  public function listaDimensiones(){
    return $this->descripciones()->distinct()
                ->select('productos_descripcion.id', 'productos_descripcion.dimension')
                ->get()
                ->sortBy('n_orden');
  }
  /*******************************************************************************
    * Lista de productos con imagen
    * @in 
    * @out Collection[dimensiones]
    *********************************************************************************/
  public static function listaProductosConImagen($filtro){
    return Producto::select(
      'productos.id', 
      'productos.codigo', 
      'productos.marca', 
      'productos.descripcion', 
      'productos.categoria', 
      'imagenes.imagen')->join('imagenes', function ($join){
        $join->on('imagenes.producto_id', '=', 'productos.id')
             ->where('imagenes.n_orden', 1);
    })->buscar($filtro)->limit(20)->get();
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
      $descripcion = DescripcionProducto::create(['n_orden' => $n+1, 'dimension' => $dimension]);
      array_push($arr, $descripcion->id);
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
  /*********************************************************************************
    * Funcion para actualizar el producto
    * @in producto, categorias, colores, dimensiones
    * @out
    *********************************************************************************/
  public function actualizar($datos){
    $this->fill($datos['producto']);
    $this->categoria = $this->srtCategoria($datos['categorias']);
    $this->save();
    $this->categorias()->sync($datos['categorias']);
    
    $arrIdsColoresBorrar = $this->idsColoresBorrar($datos);
    if (count($arrIdsColoresBorrar) > 0) 
      $this->colores()->detach($arrIdsColoresBorrar); 

    $arrIdsDescripciones = $this->idsDescripcionesBorrar($datos);
    if (count($arrIdsDescripciones) > 0) {
      $this->descripciones()->detach($arrIdsDescripciones);
      DescripcionProducto::destroy($arrIdsDescripciones);
    }

    $this->actualizarDescripciones($datos);
    
    if (isset($datos['dimensiones_nuevas'])) {
      $idsDimensiones = $this->arrDimensionesNuevas($datos);
      $articulos = $this->arrArticulos($datos['colores'], $idsDimensiones, $this->id);
      DB::table('articulos')->insert($articulos);
    }

    if (isset($datos['colores_nuevos'])) {
      $idsDimensiones = collect($datos['dimensiones_actuales'])->pluck('id')->all();
      $articulos = $this->arrArticulos($datos['colores_nuevos'], $idsDimensiones, $this->id);
      DB::table('articulos')->insert($articulos);
    }
  }
  
  /*******************************************************************************
    * Arreglo de ids de Colores que se van a borrar
    * @in Array[]
    * @out Array
  *********************************************************************************/
  public function idsColoresBorrar($datos){
    $arrColores = $this->colores()->distinct()->get()->pluck('id')->all();
    $arrColoresActuales = $datos['colores'];
    $colores = array();

    foreach ($arrColores as $idColor) 
      if (!in_array($idColor, $arrColoresActuales)) array_push($colores, $idColor);
    
    return $colores;
  }

  /*******************************************************************************
    * Arreglo de ids de Descripciones que se van a borrar
    * @in Array[]
    * @out Array
  *********************************************************************************/
  public function idsDescripcionesBorrar($datos){
    $idsDescripciones = $this->descripciones()->distinct()->get()->pluck('id')->all();
    $idsDescripcionesActuales = collect($datos['dimensiones_actuales'])->pluck('id')->all();
    $dimeniones = array();

    foreach ($idsDescripciones as $idDescripcion)
      if (!in_array($idDescripcion, $idsDescripcionesActuales)) array_push($dimeniones, $idDescripcion);
    
    return $dimeniones;
  }

  /*******************************************************************************
    * Actualiza el n_orden de las descripciones del producto
    * @in Array[]
    * @out 
  *********************************************************************************/
  public function actualizarDescripciones($datos){
    $dimesionesActuales = $datos['dimensiones_actuales'];

    foreach ($dimesionesActuales as $dimension) {
      $descripcion = DescripcionProducto::find($dimension['id']);
      $descripcion->n_orden = $dimension['n_orden'];
      $descripcion->save();
    }
  }

  /*******************************************************************************
    * Funcion que guarda las dimensiones nuevas y arroja los ids guardados
    * @in Array[]
    * @out 
  *********************************************************************************/
  public function arrDimensionesNuevas($datos){
    $dimensiones = $datos['dimensiones_nuevas'];
    $arr = [];
    
    foreach ($dimensiones as $dimension) {      
      $descripcion = DescripcionProducto::create(['n_orden' => $dimension['n_orden'], 'dimension' => $dimension['dimension']]);
      array_push($arr, $descripcion->id);
    }

    return $arr;
  }
  //***********************************************************************************
  //----------------------------FUNCIONES PARA ELIMINAR PRODUCTO-----------------------
  //***********************************************************************************
  /*********************************************************************************
    * Funcion para eliminar el producto
    * @in producto, categorias, colores, dimensiones
    * @out
  *********************************************************************************/
  public function eliminar(){
    $dimensiones = $this->descripciones()->distinct()->get()->pluck('id')->all();
    $this->descripciones()->detach($dimensiones);
    DescripcionProducto::destroy($dimensiones);
    $this->categorias()->detach();
    $this->imagenes()->delete();
    $this->delete();
  }
}
