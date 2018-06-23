<?php

namespace App\Http\Controllers\compras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;
use App\Models\Contacto;

class contactosController extends Controller
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
    Contacto::create($request->all());

    $filtro = (isset($request->filtro) && !empty($request->filtro))?$request->filtro:'';
    $page = $request->page;
    $contactos = Contacto::buscar($filtro)->paginate(5);

    return response()->json(view('admin.compras.proveedores.contactos.index.include.tContactos', 
      ['contactos' => $contactos])->render());
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
  public function edit(Contacto $contacto){
    return response()->json(['contacto' => $contacto]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Contacto $contacto){
    $contacto->fill($request->all());
    $contacto->save();

    $filtro = (isset($request->filtro) && !empty($request->filtro))?$request->filtro:'';
    $page = $request->page;
    $contactos = Contacto::buscar($filtro)->paginate(5);

    return response()->json(view('admin.compras.proveedores.contactos.index.include.tContactos', 
      ['contactos' => $contactos])->render());
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $id){
    Contacto::destroy($id);

    $filtro = (isset($request->filtro) && !empty($request->filtro))?$request->filtro:'';
    $page = $request->page;
    $contactos = Contacto::buscar($filtro)->paginate(5);

    return response()->json(view('admin.compras.proveedores.contactos.index.include.tContactos', 
      ['contactos' => $contactos])->render());
  }

  /**
   * Retorna una vista index con los contactos de los proveedores.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function lista($proveedor_id){
    $proveedor = Proveedor::findOrFail($proveedor_id);
    $contactos = DB::table('contactos')->where('proveedor_id', $proveedor_id)->paginate(5);

    return view('admin.compras.proveedores.contactos.index.index', [
      'empresa'       =>  $proveedor->empresa,
      'proveedor_id'  =>  $proveedor->id,
      'contactos'     =>  $contactos
    ]);
  }

  /**
   * Retorna una tabla html con los contactos de los proveedores.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function tabla(Request $request, $proveedor_id){
    $proveedor = Proveedor::findOrFail($proveedor_id);
    
    $filtro = (isset($request->filtro) && !empty($request->filtro))?$request->filtro:'';
    $page = $request->page;
    $contactos = $proveedor->contactos()->buscar($filtro)->paginate(5);

    return response()->json(view('admin.compras.proveedores.contactos.index.include.tContactos', 
      ['contactos' => $contactos])->render());
  }
}
