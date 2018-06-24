@extends('plantilla.principal')

@section('css')
  
@endsection

@section('encabezadoContenido')
  <section class="content-header">
    <h1>
      Proveedor:
      <small>{{ $empresa }}</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('admin/compras/proveedores') }}"><i class="fa fa-industry"></i> Proveedor</a></li>
      <li class="active">Productos</li>
    </ol>
  </section>
@endsection

@section('contenido')
  <div class="row">
    <div class="col-xs-12 col-sm-7" id="mensaje"></div>

    <div class="col-sm-10 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <button class="btn btn-success" data-toggle="modal" data-target="#modalNuevo">
            <i class="glyphicon glyphicon-plus"></i>
            Nuevo
          </button>

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" id="buscar" class="form-control pull-right" placeholder="Buscar">
              <span class="input-group-addon"><i class="fa fa-search"></i></span>
            </div>
          </div>  
        </div>

        <div id="tabla">
          @include('admin.compras.proveedores.productos.index.include.tProductos')
        </div>
      </div>
    </div>
  </div>
  
  @include('admin.compras.proveedores.productos.index.include.modalNuevo')
  @include('admin.compras.proveedores.productos.index.include.modalEliminar')
@endsection

@push('js')
  @include('librerias.js.mensajes')
  @include('admin.compras.proveedores.productos.index.js.js')
  @include('admin.compras.proveedores.productos.index.js.jsModalNuevo')
  @include('admin.compras.proveedores.productos.index.js.jsModalEliminar')
@endpush