@extends('plantilla.principal')

@section('css')
	@include('inventario.envios.compras.create.css.css')
@endsection

@section('encabezadoContenido')
	<h1>Nuevo envío a Sucursal</h1>
	<h4>
		<ol id="bread" class="breadcrumb">
		  <li><a href="{{ url('inventario/enviosCompras') }}">Envios</a></li>
		  <li class="active">Nuevo</li>
		</ol>
	</h4>
@endsection

@section('contenido')
	<div class="row">
		<div class="col-xs-12 col-lg-9 col-md-9 col-sm-9" id="mensaje"></div>

		<div class="col-sm-11 col-xs-12">

			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Compras</h3>

		            <button class="btn btn-info pull-right" data-toggle="modal" data-target="#modalBuscar">
						<i class="glyphicon glyphicon-search"></i>
						Buscar
					</button>
			        
				</div>

				<div id="tabla">
					
				</div>
				

			</div>

		</div>
	</div>

	@include('inventario.envios.compras.create.include.modalBuscar')

@endsection

@push('js')
	@include('inventario.envios.compras.create.js.js')
	@include('inventario.envios.compras.create.js.jsModalBuscar')
@endpush