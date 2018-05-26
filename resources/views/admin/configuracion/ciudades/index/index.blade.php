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

    <div class="col-xs-5">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title"></h3>
          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalNuevo">
            <i class="glyphicon glyphicon-plus"></i>Nuevo
          </button> 

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 200px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar">

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
@endsection

@push('js')

@endpush