@extends('plantilla.principal')

@section('encabezadoContenido')
	<h1>Productos</h1>
@endsection

@section('css')
	@include('inventario.producto.index.estilos.css')
@endsection

@section('contenido')
	<div class="row">
		<div class="col-xs-12 col-lg-9 col-md-9 col-sm-9" id="mensaje"></div>

		<div class="col-md-9 col-sm-12 col-xs-12">
			
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
					@include('inventario.producto.index.include.productos')
				</div>
			</div>
		</div>
	</div>

	@include('inventario.producto.create.include.modalIngresarColor')
	@include('inventario.producto.create.include.modalIngresarCategoria')
	@include('inventario.producto.create.include.modalIngresarUnidad')
	@include('inventario.producto.index.include.modalIngresarMarca')

	@include('inventario.producto.index.include.modalDatos')
	@include('inventario.producto.index.include.modalColores')
	@include('inventario.producto.index.include.modalDimensiones')
	
	
@endsection

@push('js')
	@include('inventario.producto.index.js.js')
	@include('inventario.producto.index.js.jsModalDatos')
	@include('inventario.producto.index.js.jsModalColores')
	@include('inventario.producto.index.js.jsModalDimensiones')
@endpush