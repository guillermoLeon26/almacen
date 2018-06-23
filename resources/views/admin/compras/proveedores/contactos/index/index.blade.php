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
      <li class="active">Contactos</li>
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
          @include('admin.compras.proveedores.contactos.index.include.tContactos')
        </div>
      </div>
    </div>
  </div>

  @include('admin.compras.proveedores.contactos.index.include.modalNuevo')
  @include('admin.compras.proveedores.contactos.index.include.modalEditar')
  @include('admin.compras.proveedores.contactos.index.include.modalEliminar')
@endsection

@push('js')
  @include('admin.compras.proveedores.contactos.index.js.js')
  @include('librerias.js.mensajes')
  @include('admin.compras.proveedores.contactos.index.js.jsModalNuevo')
  @include('admin.compras.proveedores.contactos.index.js.jsModalEditar')
  @include('admin.compras.proveedores.contactos.index.js.jsModalEliminar')
@endpush