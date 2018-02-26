@extends('plantilla.principal')

@section('css')
	
@endsection

@section('encabezadoContenido')
	<h1>Enviar</h1>
	<h4>
		<ol id="bread" class="breadcrumb">
		  <li><a href="{{ url('inventario/enviosCompras') }}">Envios</a></li>
		  <li><a href="{{ url('inventario/enviosCompras/create') }}">Nuevo</a></li>
		  <li class="active">Enviar</li>
		</ol>
	</h4>
@endsection

@section('contenido')
	<div class="row">
		<div class="col-sm-9" id="mensaje"></div>

			<form id="formCrearEnvio">
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
						<div class="tab-pane active" role="tabpanel" id="tabDatos">
							@include('inventario.envios.compras.enviar.include.tabDatos')
						</div>

						<div class="tab-pane" role="tabpanel" id="tabItems">
							@include('inventario.envios.compras.enviar.include.tabItems')	
						</div>

					</div>
				</div>
			</form>
	</div>
	
@endsection

@push('js')
	@include('inventario.envios.compras.enviar.js.js')
	@include('inventario.envios.compras.enviar.js.jsTabDatos')
	@include('inventario.envios.compras.enviar.js.jsPrincipal')
@endpush