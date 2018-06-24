<?php

namespace App\Http\Controllers\compras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductosProveedor;
use App\Models\Proveedor;

class productosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //
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
    ProductosProveedor::create($request->all());

    $filtro = (isset($request->filtro) && !empty($request->filtro))?$request->filtro:'';
    $page = $request->page;
    $productos = ProductosProveedor::buscar($filtro)->paginate(5);

    return response()->json(view('admin.compras.proveedores.productos.index.include.tProductos', 
      ['productos' => $productos])->render());
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
   * Retorna una vista index con los productos de los proveedores.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function lista($proveedor_id){
    $proveedor = Proveedor::findOrFail($proveedor_id);
    $productos = ProductosProveedor::where('proveedor_id', $proveedor_id)->paginate(5);

    return view('admin.compras.proveedores.productos.index.index', [
      'empresa'       =>  $proveedor->empresa,
      'proveedor_id'  =>  $proveedor->id,
      'productos'     =>  $productos
    ]);
  }
}
