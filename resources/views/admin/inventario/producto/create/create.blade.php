@extends('plantilla.principal')

@section('encabezadoContenido')
  <section class="content-header">
      <h1>
        Crear producto
      </h1>
      <ol class="breadcrumb">
        <li>
          <a href="{{ url('admin/inventario/productos') }}">
          <i class="glyphicon glyphicon-apple"></i> Productos</a>
        </li>
        <li class="active">Crear</li>
      </ol>
    </section>
@endsection

@section('contenido')
  <div class="row">
    <div class="col-xs-12 col-sm-9" id="mensaje"></div>
    
    <div class="col-sm-9 col-xs-12">
      <form id="formCrearProducto">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li class="pull-left header">
              <button type="submit" id="btnGuardar" class="btn btn-success">
                <span class="fa fa-save" aria-hidden="true"></span>
                 Guardar
              </button>
            </li>
            <li class="active"><a href="#Datos" data-toggle="tab">Datos</a></li>
            <li><a href="#tabColores" data-toggle="tab">Colores</a></li>
            <li><a href="#tabDimensiones" data-toggle="tab">Dimensiones</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="Datos">
              @include('admin.inventario.producto.create.include.tabDatos')
            </div>
            <div class="tab-pane" id="tabColores">
              @include('admin.inventario.producto.create.include.tabColores')
            </div>
            <div class="tab-pane" id="tabDimensiones">
              @include('admin.inventario.producto.create.include.tabDimensiones')
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  @include('admin.inventario.producto.create.include.modalIngresarColor')
  @include('admin.inventario.producto.create.include.modalIngresarCategoria')
  @include('admin.inventario.producto.create.include.modalIngresarUnidad')
  @include('admin.inventario.producto.create.include.modalIngresarMarca')
@endsection

@push('js')
  @include('admin.inventario.producto.create.js.js')
  @include('librerias.js.mensajes')
  @include('admin.inventario.producto.create.js.jsModalDatos')
@endpush