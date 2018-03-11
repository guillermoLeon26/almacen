@extends('plantilla.principal')

@section('css')
  @include('admin.inventario.producto.index.estilos.css')
@endsection

@section('encabezadoContenido')
  <div class="box-header">
    <h2 class="box-title" style="font-size: 30px">Catalogo de Productos</h2>

    <div class="box-tools">
      <a href="{{ url('admin/inventario/productos/create') }}" class="btn btn-success pull-right">
        <i class="glyphicon glyphicon-plus"></i>
        Nuevo
      </a>
    </div>

  </div>
@endsection

@section('contenido')
  <div class="row">
    <div class="col-xs-12 col-sm-9" id="mensaje"></div>

    <div class="col-md-9 col-xs-12">
      
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="box-tools">
            <div class="input-group input-group-sm" style="150px">
              <input type="text" id="buscar" name="buscar" class="form-control pull-right" placeholder="Buscar">
            </div>
          </div>
          <br>
        </div>        

        <div id="productos">
          @include('admin.inventario.producto.index.include.productos')
        </div>
      </div>
    </div>
  </div>

@endsection

@push('js')
  @include('admin.inventario.producto.index.js.js')
@endpush