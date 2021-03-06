<?php

namespace App\Http\Controllers\contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config_Cont;
use App\Models\Producto;
use App\Models\DescripcionProducto;
use Illuminate\Support\Facades\DB;

class precioProductoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
    $producto = Producto::findOrFail($request->id);
    $dimensiones = $producto->listaDescripciones();

    return response()->json([
      'producto_id' =>  $producto->id,
      'dimensiones'  =>  $dimensiones
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request){
    DB::beginTransaction();
    try {
      DescripcionProducto::actualizarPrecios($request);
      DB::commit();

      return response()->json([]);
    } catch (\Exception $e) {
      DB::rollBack();

      return response()->json([], 500);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }

 /**
   * Retorna vista Precio producto por menor
   *
   * @return \Illuminate\Http\Response
   */
  public function precioPorMenor(){
    $config = Config_Cont::findOrFail(1);

    return view('admin.contabilidad.precio.menor.menor', ['config' => $config]);
  }

  /**
   * Retorna vista Precio producto por mayor
   *
   * @return \Illuminate\Http\Response
   */
  public function precioPorMayor(){
    $config = Config_Cont::findOrFail(1);
    
    return view('admin.contabilidad.precio.mayor.mayor', ['config' => $config]);
  }
}
