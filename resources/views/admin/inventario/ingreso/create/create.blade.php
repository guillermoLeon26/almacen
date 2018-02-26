@extends('plantilla.principal')

@section('css')
	@include('inventario.ingreso.create.css.css')
@endsection

@section('encabezadoContenido')
	<h1>Nuevo Ingreso</h1>
	<h4>
		<ol id="bread" class="breadcrumb">
		  <li><a href="{{ url('inventario/ingreso') }}">Ingresos</a></li>
		  <li class="active">Nuevo</li>
		</ol>
	</h4>
@endsection

@section('contenido')
	<div class="row">
		<div class="col-sm-9" id="mensaje"></div>

			<form id="formGuardar">
				<div class="col-sm-9 nav-tabs-custom">
					<ul class="nav nav-tabs pull-right" role="tablist">
						<li class="pull-left header">
							<button type="submit" id="btnGuardar" class="btn btn-success">
								<span class="fa fa-save" aria-hidden="true"></span>
							</button>
						</li>
						<li role="presentation" class="active">
							<a href="#tabDatos" aria-controls="tabDatos" role="tab" data-toggle="tab">Datos</a>
						</li>
						<li role="presentation" >
							<a href="#tabItems" aria-controls="tabItems" role="tab" data-toggle="tab">Items</a>
						</li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane active compra" role="tabpanel" id="tabDatos">
							@include('inventario.ingreso.create.include.tabDatos')
						</div>

						<div class="tab-pane" role="tabpanel" id="tabItems">
							@include('inventario.ingreso.create.include.tabItems')
						</div>

					</div>
				</div>
			</form>
	</div>
	
	@include('inventario.ingreso.create.include.modalIngresarItems')
@endsection

@push('js')
	@include('inventario.ingreso.create.js.js')	
	@include('inventario.ingreso.create.js.jsTabItems')
	@include('inventario.ingreso.create.js.jsPrincipal')
@endpush