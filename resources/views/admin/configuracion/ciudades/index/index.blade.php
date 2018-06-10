@extends('plantilla.principal')

@section('css')

@endsection

@section('encabezadoContenido')
  <div class="box-header">
    <h2 class="box-title" style="font-size: 30px">Ciudades</h2>
  </div>
@endsection

@section('contenido')
  <div class="row">
    <div id="mensaje"></div>

    <div class="col-xs-10 col-sm-5">
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
        
        <div id="tCiudades">
          @include('admin.configuracion.ciudades.index.include.tCiudades')
        </div>
      </div>
    </div>
  </div>

  @include('admin.configuracion.ciudades.index.include.modalNuevo')
  @include('admin.configuracion.ciudades.index.include.modalEliminar')
@endsection

@push('js')
  @include('librerias.js.mensajes')
  @include('admin.configuracion.ciudades.index.js.js')
  @include('admin.configuracion.ciudades.index.js.jsModalNuevo')
  @include('admin.configuracion.ciudades.index.js.jsModalEliminar')
@endpush