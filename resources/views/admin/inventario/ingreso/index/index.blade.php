@extends('plantilla.principal')

@section('css')
	
@endsection

@section('encabezadoContenido')
	<h1>Ingresos</h1>
@endsection

@section('contenido')
	<div class="row">
		<div class="col-xs-12 col-lg-9 col-md-9 col-sm-9" id="mensaje"></div>

		<div class="col-sm-11 col-xs-12">

			<div class="box box-primary">
				<div class="box-header with-border">
					<a href="{{ url('inventario/ingreso/create') }}" class="btn btn-success">
						<i class="glyphicon glyphicon-plus"></i>
						Nuevo
					</a>
					
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

@endsection

@push('js')
	
@endpush