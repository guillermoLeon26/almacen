@extends('plantilla.principal')

@section('css')
	@include('inventario.producto.imagenes.css.css')
@endsection

@section('encabezadoContenido')
	<h1>Imagenes</h1>
	<h4>
		<ol id="bread" class="breadcrumb">
		  <li><a href="{{ url('inventario/producto') }}">Productos</a></li>
		  <li class="active">Imagenes</li>
		</ol>
	</h4>
@endsection

@section('contenido')
	<div class="row">
		<div class="col-xs-12 col-lg-9 col-md-9 col-sm-9" id="mensaje"></div>

		<div class="col-md-9 col-xs-12">

			<div class="box box-primary">
				<div class="box-header">
					<button class="btn btn-success" onclick="ingresarImagenProducto()">Ingresar</button>
				</div>

				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Mover</th>
								<th>Imagen</th>
								<th>Color</th>
								<th>Eliminar</th>
							</tr>	
						</thead>

						<tbody id="tbodyTablaImagenes">
							@include('inventario.producto.imagenes.include.imagenes')
						</tbody>
					</table>					
				</div>
			</div>
		</div>
	</div>

	@include('inventario.producto.imagenes.include.modalIngresarImagen')
	
@endsection

@push('js')
	@include('inventario.producto.imagenes.js.js')
@endpush