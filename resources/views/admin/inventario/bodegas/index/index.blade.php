@extends('plantilla.principal')

@section('encabezadoContenido')
  <div class="box-header">
    <h2 class="box-title" style="font-size: 30px">Bodegas</h2>
  </div>
@endsection

@section('contenido')
  <div class="row">
    <div id="mensaje" class="col-xs-10"></div>

    <div class="col-xs-10 col-sm-8">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title"></h3>
          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalNuevo">
            <i class="glyphicon glyphicon-plus"></i>Nuevo
          </button> 

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 200px;">
              <input type="text" id="buscar" class="form-control pull-right" placeholder="Buscar">

              <div class="input-group-addon">
                <i class="fa fa-search"></i>
              </div>
            </div>
          </div>
        </div>
        
        <div id="tBodegas">
          @include('admin.inventario.bodegas.index.include.tbodegas')
        </div>
      </div>
    </div>
  </div>

  @include('admin.inventario.bodegas.index.include.modalNuevo')
  @include('admin.inventario.bodegas.index.include.modalEliminar')
@endsection

@push('js')
  @include('admin.inventario.bodegas.index.js.js')
  @include('librerias.js.mensajes')
  @include('admin.inventario.bodegas.index.js.jsModalNuevo')
  @include('admin.inventario.bodegas.index.js.jsModalEliminar')
@endpush