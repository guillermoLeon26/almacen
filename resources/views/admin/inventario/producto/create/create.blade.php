@extends('plantilla.principal')

@section('encabezadoContenido')
	<h1>Crear productos</h1>
@endsection

@section('contenido')
	<div class="row">
		<div class="col-xs-12 col-lg-9 col-md-9 col-sm-9" id="mensaje"></div>
		
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
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
							@include('inventario.producto.create.include.tabDatos')
						</div>
						<div class="tab-pane" id="tabColores">
							@include('inventario.producto.create.include.tabColores')
						</div>
						<div class="tab-pane" id="tabDimensiones">
							@include('inventario.producto.create.include.tabDimensiones')
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	@include('inventario.producto.create.include.modalIngresarColor')
	@include('inventario.producto.create.include.modalIngresarCategoria')
	@include('inventario.producto.create.include.modalIngresarUnidad')
	@include('inventario.producto.create.include.modalIngresarMarca')
@endsection

@push('js')
	@include('inventario.producto.create.funciones')
@endpush