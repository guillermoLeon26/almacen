<div class="box box-primary">			
	<div class="box-body">
		<form class="form-horizontal">
			<div class="form-group col-lg-12 co-md-12 col-sm-12 col-xs-12">
				<label class="col-lg-2 co-md-2 col-sm-2 col-xs-2 control-label">Color</label>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="padding-right: 1px;">
					<div id="selColor">
						@include('inventario.producto.create.include.cbColor')
					</div>
				</div>
	
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="padding-left: 0px;">
					<button id="btnModalColor" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalIngresarColor">
						<span class="fa fa-plus" aria-hidden="true"></span>
					</button>
				</div>
			</div>

		</form>
	</div>

	<div class="box-footer">
		<button id="btnAgregarColorTabla" type="button" class="btn btn-primary pull-right">Agregar</button>
	</div>
</div>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Colores</h3>
	</div>

	<div class="box-body table-resposive no-padding">
		<table class="table table-hover table-condensed">
			<thead>
				<tr>
					<th>Color</th>
					<th>Opciones</th>
				</tr>
			</thead>

			<tbody id="trTablaColores"></tbody>
		</table>
	</div>
</div>
