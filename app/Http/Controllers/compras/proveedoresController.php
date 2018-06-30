<?php

namespace App\Http\Controllers\compras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use App\Http\Requests\ProveedorRequest;
use Illuminate\Support\Facades\DB;
use App\Rules\SePuedeEliminarProveedor;

class proveedoresController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){
    $proveedores = Proveedor::paginate(5);

    return view('admin.compras.proveedores.index.index', ['proveedores' => $proveedores]);
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
  public function store(ProveedorRequest $request){
    Proveedor::create($request->all());

    $filtro = (isset($request->filtro) && !empty($request->filtro))?$request->filtro:'';
    $page = $request->page;
    $proveedores = Proveedor::buscar($filtro)->paginate(5);

    return response()->json(view('admin.compras.proveedores.index.include.tProveedores', 
      ['proveedores' => $proveedores])->render());
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
  public function edit($id){
    $proveedor = Proveedor::findOrFail($id);

    return response()->json(['proveedor' => $proveedor]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(ProveedorRequest $request, $id){
    $proveedor = Proveedor::findOrFail($id);
    $proveedor->fill($request->all());
    $proveedor->save();

    $filtro = (isset($request->filtro) && !empty($request->filtro))?$request->filtro:'';
    $page = $request->page;
    $proveedores = Proveedor::buscar($filtro)->paginate(5);

    return response()->json(view('admin.compras.proveedores.index.include.tProveedores', 
      ['proveedores' => $proveedores])->render());
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $id){
    $proveedor = Proveedor::findOrFail($id);

    $request->validate([
      'proveedor_id'  =>  ['required', new SePuedeEliminarProveedor($proveedor)]
    ]);

    DB::beginTransaction();
    try {
      $proveedor->eliminar();
      DB::commit();

      $filtro = (isset($request->filtro) && !empty($request->filtro))?$request->filtro:'';
      $page = $request->page;
      $proveedores = Proveedor::buscar($filtro)->paginate(5);

      return response()->json(view('admin.compras.proveedores.index.include.tProveedores', 
        ['proveedores' => $proveedores])->render());

    } catch (\Exception $e) {
      DB::rollBack();

      return response()->json([], 500);
    }
  }

  /**
   * Devuelve una tabla HTML de proveedores
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function tablaProveedores(Request $request){
    $filtro = (isset($request->filtro) && !empty($request->filtro))?$request->filtro:'';
    $page = $request->page;
    $proveedores = Proveedor::buscar($filtro)->paginate(5);

    return response()->json(view('admin.compras.proveedores.index.include.tProveedores', 
      ['proveedores' => $proveedores])->render());
  }

  /**
   * Devuelve una lista en formato json HTML de todos los proveedores
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function lista(Request $request){
    $filtro = (isset($request->filtro) && !empty($request->filtro))?$request->filtro:'';
    $proveedores = Proveedor::buscar($filtro)->get()->take(20);

    return response()->json(['proveedores' => $proveedores]);
  }
}
