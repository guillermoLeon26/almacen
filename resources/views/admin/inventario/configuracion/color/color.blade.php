@extends('plantilla.principal')

@section('css')
	@include('admin.inventario.configuracion.color.estilos')
@endsection

@section('encabezadoContenido')
	<div class="box-header">
		<h2 class="box-title" style="font-size: 30px">Colores</h2>

		<div class="box-tools">
			<button id="btnNuevo" class="btn btn-success pull-right" type="button" data-toggle="modal" data-target="#modalNuevo">
				<i class="glyphicon glyphicon-plus"></i>
				Nuevo
			</button>	
		</div>

	</div>
@endsection

@section('contenido')
	@include('admin.inventario.configuracion.color.include.ingresar')
	@include('admin.inventario.configuracion.color.include.eliminar')

	<div class="row">

	<div id="mensaje"></div>

	<div class="col-xs-8">
		
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="box-tools">
					<div class="input-group input-group-sm" style="150px">
						<input type="text" id="buscar" name="buscar" class="form-control pull-right" placeholder="Buscar">
					</div>
				</div>
				<br>
			</div>				

			<div id="colores">
				@include('admin.inventario.configuracion.color.include.colores')
			</div>
		</div>

		</div>
	</div>
@endsection

@push('js')
	@include('admin.inventario.configuracion.color.funciones')
@endpush