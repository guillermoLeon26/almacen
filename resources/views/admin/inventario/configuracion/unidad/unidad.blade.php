@extends('plantilla.principal')

@section('css')
	@include('admin.inventario.configuracion.unidad.estilos')
@endsection

@section('encabezadoContenido')
	<div class="box-header">
		<h2 class="box-title" style="font-size: 30px">Unidades de Medida</h2>

		<div class="box-tools">
			<button id="registrarIngreso" class="btn btn-success pull-right" type="button" data-toggle="modal" data-target="#ingresarModal">
				<i class="glyphicon glyphicon-plus"></i>Nuevo
			</button>	
		</div>

	</div>
@endsection

@section('contenido')
	@include('admin.inventario.configuracion.unidad.include.mostrar')
	@include('admin.inventario.configuracion.unidad.include.eliminar')
	@include('admin.inventario.configuracion.unidad.include.ingresar')
	
	<div class="row">

	<div class="col-xs-12 col-sm-9" id="mensaje"></div>


	<div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
		
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="box-tools">
					<div class="input-group input-group-sm" style="150px">
						<input type="text" id="buscar" name="buscar" class="form-control pull-right" placeholder="Buscar">
					</div>
				</div>
				<br>
			</div>				

			<div id="marcas">
				@include('admin.inventario.configuracion.unidad.include.unidades')
			</div>
		</div>
	</div>

	</div>
@endsection

@push('js')
	@include('admin.inventario.configuracion.unidad.funciones')
@endpush