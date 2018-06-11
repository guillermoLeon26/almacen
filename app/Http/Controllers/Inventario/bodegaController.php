<?php

namespace App\Http\Controllers\Inventario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bodega;
use Illuminate\Support\Facades\DB;

class bodegaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){
    $bodegas = Bodega::paginate(5);

    return view('admin.inventario.bodegas.index.index', ['bodegas' => $bodegas]);
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
      'nombre'    =>  'required|string|max:45',
      'direccion' =>  'required|string|max:100',
      'ciudad_id' =>  'required|numeric'
    ]);

    DB::beginTransaction();

    try {
      Bodega::guardar($request);
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
   * Genera una tabla html de bodegas.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function tablaBodegas(Request $request){
    $filtro = (isset($request->filtro) && !empty($request->filtro))?$request->filtro:'';
    $page = $request->page;
    $bodegas = Bodega::buscar($filtro)->paginate(5);
    
    return response()->json(
      view('admin.inventario.bodegas.index.include.tbodegas', ['bodegas' => $bodegas])
      ->render()
    );
  }
}
