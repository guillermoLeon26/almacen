<?php

namespace App\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use App\Rules\SePuedeEliminarCiudad;

class ciudadesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
    $filtro = (isset($request->filtro) && !empty($request->filtro))?$request->filtro:'';
    $page = $request->page;
    $ciudades = Ciudad::buscar($filtro)->paginate(5);

    if ($request->ajax()) {
        return response()->json(view('admin.configuracion.ciudades.index.include.tCiudades', ['ciudades'=>$ciudades])
          ->render());
    }

    return view('admin.configuracion.ciudades.index.index', ['ciudades' => $ciudades]);
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
    $request->validate([
      'ciudad'  =>  'required|string|max:45'
    ]);

    Ciudad::create($request->all());

    return response()->json([]);
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
  public function destroy(Request $request, $id){
    $request->validate([
      'ciudad_id' =>  [
        'required',
        new SePuedeEliminarCiudad
      ]
    ]);

    Ciudad::destroy($id);

    return response()->json([]);
  }
}
