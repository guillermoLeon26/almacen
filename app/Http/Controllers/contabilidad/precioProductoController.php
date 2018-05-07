<?php

namespace App\Http\Controllers\contabilidad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config_Cont;

class precioProductoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){
    dd('fsd');
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
  public function store(Request $request)
  {
      //
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
      return view('contabilidad.precio.mayor.mayor', ['empresa' => Empresa::get()]);
  }
}
