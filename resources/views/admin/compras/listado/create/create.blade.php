@extends('plantilla.principal')

@section('css')
  @include('admin.compras.listado.create.css.css')
@endsection

@section('encabezadoContenido')
  <section class="content-header">
    <h1>Nueva Compra</h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('admin/compras/listado') }}"><i class="glyphicon glyphicon-list"></i> Proveedor</a></li>
      <li class="active">Nueva Compra</li>
    </ol>
  </section>
@endsection

@section('contenido')
  <div class="row">
    <div class="col-sm-9" id="mensaje"></div>

      <form id="formCrearCompra">
        <div class="col-sm-10 nav-tabs-custom">
          <ul class="nav nav-tabs pull-right" role="tablist">
            <li class="pull-left header">
              <button type="submit" id="btnGuardar" class="btn btn-success">
                <span class="fa fa-save" aria-hidden="true"></span>
              </button>
            </li>
            <li role="presentation" class="active">
              <a href="#tabDatos" aria-controls="tabDatos" role="tab" data-toggle="tab">Datos</a>
            </li>

            <li role="presentation" >
              <a href="#tabItems" aria-controls="tabItems" role="tab" data-toggle="tab">Items</a>
            </li>
              
            </li>
            <li role="presentation" class="cuentaXPagar" style="visibility: hidden;">
              <a href="#tabPagos" aria-controls="tabPagos" role="tab" data-toggle="tab">Pagos</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active compra" role="tabpanel" id="tabDatos">
              @include('admin.compras.listado.create.include.tabDatos')
            </div>

            <div class="tab-pane" role="tabpanel" id="tabItems">
              @include('admin.compras.listado.create.include.tabItems')
            </div>

            <div class="tab-pane cuentaXPagar" role="tabpanel" id="tabPagos" style="visibility: hidden;">
              @include('admin.compras.listado.create.include.tabPagos')
            </div>
          </div>
        </div>
      </form>
  </div>
  
  @include('admin.compras.listado.create.include.modalIngresarItems')
  @include('admin.compras.listado.create.include.modalIngresarPagos')
@endsection

@push('js')
  @include('librerias.js.mensajes')
  @include('admin.compras.listado.create.js.js')
  @include('admin.compras.listado.create.js.jsTabDatos')
  @include('admin.compras.listado.create.js.jsTabItems')
  @include('admin.compras.listado.create.js.jsTabPagos')
@endpush