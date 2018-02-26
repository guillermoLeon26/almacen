@extends('plantilla.principal')

@section('css')
	@include('inventario.configuracion.marca.estilos')
@endsection

@section('encabezadoContenido')
	<h1>Marcas</h1>
@endsection

@section('contenido')
	@include('inventario.configuracion.marca.include.mostrar')
	@include('inventario.configuracion.marca.include.eliminar')
	
	<div class="row">

	<div id="mensaje"></div>

	<div class="col-lg-5 col-md-5 col-sm-8 col-xs-12">
		@include('inventario.configuracion.marca.include.ingresar')
	
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
				@include('inventario.configuracion.marca.include.marcas')
			</div>
		</div>
	</div>

	</div>
@endsection

@push('js')
	@include('inventario.configuracion.marca.funciones')
@endpush