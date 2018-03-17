<?php

namespace App\Http\Controllers\Inventario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Unidad;
use App\Models\Color;
use App\Http\Requests\CategoriaRequest;
use App\Http\Requests\MarcaRequest;
use App\Http\Requests\UnidadRequest;
use App\Http\Requests\ColorRequest;
use App\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request){
    $filtro = (isset($request->filtro) && !empty($request->filtro))?$request->filtro:'';
    $page = $request->page;

    $productos = Producto::buscar($filtro)->paginate(5);

    if ($request->ajax()) {
      return response()
        ->json(view('admin.inventario.producto.index.include.productos', ['productos' => $productos])
          ->render());
    }

    return view('admin.inventario.producto.index.index', ['productos' => $productos]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(){
    $categorias = Categoria::all();
    $marcas = Marca::all();
    $unidades = Unidad::all();
    $colores = Color::all();

    return view('admin.inventario.producto.create.create', 
      [
        'categorias'  =>  $categorias,
        'marcas'      =>  $marcas,
        'unidades'    =>  $unidades,
        'colores'     =>  $colores
      ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ProductoRequest $request){
    DB::beginTransaction();
    
    try {
      Producto::guardar($request->all());
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
  public function edit(Producto $producto){
    $categorias = Categoria::all();
    $marcas = Marca::all();
    $unidades = Unidad::all();
    $colores = Color::all();

    return view('admin.inventario.producto.edit.edit',
      [
        'categorias'  =>  $categorias,
        'marcas'      =>  $marcas,
        'unidades'    =>  $unidades,
        'colores'     =>  $colores,
        'producto'    =>  $producto
      ]);
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

  public function cbBoxCategoria(CategoriaRequest $request){
    Categoria::create($request->all());
    $categorias = Categoria::all();

    return response()
      ->json(view('admin.inventario.producto.create.include.cbCategoria', 
          ['categorias'=>$categorias])
      ->render());
  }

  public function cbBoxMarca(MarcaRequest $request){
    Marca::create($request->all());
    $marcas = Marca::all();

    return response()
      ->json(view('admin.inventario.producto.create.include.cbMarca', ['marcas' => $marcas])
      ->render());
  }

  public function cbBoxUnidad(UnidadRequest $request){
    Unidad::create($request->all());
    $unidades = Unidad::all();

    return response()
      ->json(view('admin.inventario.producto.create.include.cbUnidad', ['unidades' => $unidades])
      ->render());
  }

  public function cbBoxColor(ColorRequest $request){
    Color::create($request->all());
    $colores = Color::all();

    return response()
      ->json(view('admin.inventario.producto.create.include.cbColor', ['colores' => $colores])
      ->render());
  }
}
