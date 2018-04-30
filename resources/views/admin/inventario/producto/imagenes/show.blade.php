@extends('plantilla.principal')

@section('encabezadoContenido')
  <section class="content-header">
    <h1>Imagenes</h1>
    <ol class="breadcrumb">
      <li>
        <a href="{{ url('admin/inventario/productos') }}">
          <i class="glyphicon glyphicon-apple"></i> Productos
        </a>
      </li>
      <li class="active">Imagenes</li>
    </ol>
  </section>
@endsection

@section('contenido')
  <div class="row">
    <div class="col-xs-12 col-sm-9" id="mensaje"></div>

    <div class="col-md-9 col-xs-12">

      <div class="box box-primary">
        <div class="box-header">
          <button class="btn btn-success" onclick="ingresarImagenProducto()">Ingresar</button>
        </div>

        <div id="tbodyTablaImagenes">
          @include('admin.inventario.producto.imagenes.include.imagenes')
        </div>
      </div>
    </div>
  </div>

  @include('admin.inventario.producto.imagenes.include.modalIngresarImagen')
  @include('admin.inventario.producto.imagenes.include.modalEliminar')
  
@endsection

@push('js')
  @include('admin.inventario.producto.imagenes.js.js')
@endpush