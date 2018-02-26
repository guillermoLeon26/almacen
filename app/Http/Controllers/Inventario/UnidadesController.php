<?php

namespace App\Http\Controllers\Inventario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UnidadRequest;
use App\Models\Unidad;

class UnidadesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $filtro = (isset($request->filtro) && !empty($request->filtro))?$request->filtro:'';
    $page = $request->page;
    $unidades = Unidad::buscar($filtro)->paginate(5);

    if ($request->ajax()) {
      return response()->json(view('admin.inventario.configuracion.unidad.include.unidades', 
        ['unidades'=>$unidades])->render());
    }

    return view('admin.inventario.configuracion.unidad.unidad', ['unidades'=>$unidades]);
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
  public function store(UnidadRequest $request)
  {
    Unidad::create($request->all());

    return response()->json(['mensaje' => 'Se ingresó correctamente la unidad de medida']);
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
    $unidad = Unidad::findOrFail($id);

    return response()->json($unidad->toArray());
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UnidadRequest $request, $id)
  {
    $unidad = Unidad::findOrFail($id);
    $unidad->fill($request->all());
    $unidad->save();

    return response()->json(['mensaje' => 'Se actualizó correctamente la unidad.']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Unidad::destroy($id);

    return response()->json(['mensaje' => 'Se eliminó correctamente la unidad.']);
  }
}
