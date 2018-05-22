@extends('plantilla.principal')

@section('css')
  @include('admin.contabilidad.precio.mayor.css.css')
@endsection

@section('encabezadoContenido')
  <h1>Calcular Precio por mayor</h1>
@endsection

@section('contenido')
  <div class="row">
    <div class="col-xs-12 col-lg-9 col-md-9 col-sm-9" id="mensaje"></div>

    <div class="col-xs-12 col-sm-9">
      <form>
        <div class="form-group">
          <label for="selectProductos">Productos</label>
          <select id="selectProductos" class="form-control select2" style="width: 100%;"></select>  
        </div>

        <div class="form-group">
          <button id="CalculoPrecioMayor" class="btn btn-success" type="button">
            Calcular precio
          </button>
        </div>
      </form>
      
    </div>

    <div class="col-sm-9 col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <div class="checkbox">
            <label>
              <input id="checkSeleccionarTodo" type="checkbox">
              Seleccionar Todo.
            </label>
          </div>
        </div>

        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead class="encabezado">
              <tr>
                <th rowspan="2">Selección</th>
                <th rowspan="2">Dimención</th>
                <th rowspan="2">Costo</th>
                <th colspan="2">Ganancia</th>
                <th colspan="2">Descuento</th>
                <th rowspan="2">IVA</th>
                <th rowspan="2">Precio</th>
              </tr>

              <tr>
                <th>%</th>
                <th>Total</th>
                <th>%</th>
                <th>Total</th>
              </tr>
            </thead>

            <tbody id="tbodyTablaImagenes">
              
            </tbody>
          </table>          
        </div>
      </div>
    </div>
  </div>

  @include('admin.contabilidad.precio.mayor.include.modalPrecioPorMayor')

@endsection

@push('js')
  @include('admin.contabilidad.precio.mayor.js.js')
  @include('admin.contabilidad.precio.mayor.js.jsPrecioPorMayor')
@endpush