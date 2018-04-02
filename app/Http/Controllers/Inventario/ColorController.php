<?php

namespace App\Http\Controllers\Inventario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Color;
use App\Rules\SePuedeEliminarColor;

class ColorController extends Controller
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
    
    $colores = Color::buscar($filtro)->paginate(5);

    if ($request->ajax()) {
      return response()->json(view('admin.inventario.configuracion.color.include.colores', ['colores'=>$colores])->render());
    }

    return view('admin.inventario.configuracion.color.color', ['colores' => $colores]);
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
  public function store(ColorRequest $request)
  {
    Color::create($request->all());

    return response()->json(['mensaje' => 'Se ingresó con éxito el color.']);
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
    $color = Color::findOrFail($id);

    return response()->json($color->toArray());
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(ColorRequest $request, $id)
  {
    $color = Color::findOrFail($id);
    $color->fill($request->all());
    $color->save();

    return response()->json(['mensaje'=>'Se actualizó correctamente el registro']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $id)
  {
    $request->validate(['color_id' => ['required', new SePuedeEliminarColor]]);
    Color::destroy($id);

    return response()->json(['mensaje'=>'Se eliminó correctamente el color']);
  }
}
