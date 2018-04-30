<?php

namespace App\Http\Controllers\Inventario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarcaRequest;
use App\Models\Marca;
use App\Rules\SePedeEliminarMarca;

class MarcaController extends Controller
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
    $marcas = Marca::buscar($filtro)->paginate(5);

    if ($request->ajax()) {
        return response()->json(view('admin.inventario.configuracion.marca.include.marcas', ['marcas'=>$marcas])->render());
    }

    return view('admin.inventario.configuracion.marca.marca', ['marcas'=>$marcas]);
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
  public function store(MarcaRequest $request)
  {
    Marca::create($request->all());

    return response()->json(['mensaje' => 'Se ingresó con éxito la marca.']);
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
  public function edit(Marca $marca)
  {
    return response()->json($marca->toArray());
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(MarcaRequest $request, Marca $marca)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $id)
  {
    $request->validate(['marca_id' => ['required', new SePedeEliminarMarca]]);
    Marca::destroy($id);

    return response()->json(['mensaje' => 'Se eliminó con éxito la marca.']);
  }
}
