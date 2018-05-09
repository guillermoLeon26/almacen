<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Ruta bienvenida administracion
Route::get('/admin', function () {
    return view('welcome');
});

//Rutas de login y registro 
Route::group(['prefix' => 'admin'], function (){
  Auth::routes();
  Route::get('/home', 'HomeController@index')->name('home');
});

//Rutas de Inventario
Route::group(['middleware' => 'auth', 'prefix' => 'admin/inventario'], function (){
  //-----------------------------PRODUCTOS------------------------------------
  Route::resource('productos', 'Inventario\ProductosController');
  Route::group(['prefix' => 'productos'], function (){
    Route::resource('imagenes', 'Inventario\ImagenController');
    Route::post('cbBoxCategoria', 'Inventario\ProductosController@cbBoxCategoria');
    Route::post('cbBoxMarca', 'Inventario\ProductosController@cbBoxMarca');
    Route::post('cbBoxUnidad', 'Inventario\ProductosController@cbBoxUnidad');
    Route::post('cbBoxColor', 'Inventario\ProductosController@cbBoxColor');
    Route::get('cbProductos', 'Inventario\ProductosController@cbProductos');
  });
  //-----------------------------CATEGORIA-------------------------------------
  Route::resource('categoria', 'Inventario\CategoriaController');
  //---------------------------CONFIGURACION------------------------------------
  Route::group(['prefix' => 'configuracion'], function (){
    Route::resource('Color', 'Inventario\ColorController', ['except'=>['create', 'show']]);
    Route::resource('unidad', 'Inventario\UnidadesController', ['except'=>['create', 'show']]);
    Route::resource('marca', 'Inventario\MarcaController', ['except'=>['create', 'show']]);
  });
});

//Rutas de Contabilidad
Route::group(['middleware' => 'auth', 'prefix' => 'admin/cont'], function (){
  //---------------------------CONFIGURACION------------------------------------
  Route::resource('config', 'contabilidad\configController', ['only' => ['index', 'update']]);
  //-------------------------------PRECIO---------------------------------------
  Route::group(['prefix' => 'precio'], function (){
    Route::get('menor', 'contabilidad\precioProductoController@precioPorMenor');
  });
  Route::resource('precio', 'contabilidad\precioProductoController');
});
