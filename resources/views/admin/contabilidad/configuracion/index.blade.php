@extends('plantilla.principal')

@section('css')
  @include('admin.contabilidad.configuracion.css.css')
@endsection

@section('encabezadoContenido')
  <h1>Configuración</h1>
@endsection

@section('contenido')
  <div class="row">
    <div class="col-xs-12 col-sm-9" id="mensaje"></div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Impuestos</h3>
        </div>

        <form class="form-horizontal" id="formConfiguracion">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">IVA</label>

              <div class="col-sm-10">
                <div class="input-group">
                  {{ method_field('PUT') }}
                  <input type="number" class="form-control" name="IVA" value="{{ $config->IVA }}">
                  <span class="input-group-addon"><strong>%</strong></span>
                </div>
              </div>
            </div>
          </div>
          
          <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
@endsection

@push('js')
  @include('librerias.js.mensajes')
  @include('admin.contabilidad.configuracion.js.js')
@endpush