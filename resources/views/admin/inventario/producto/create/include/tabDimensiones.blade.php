<div class="box box-primary">			
	<div class="box-body">
		<form class="form-horizontal">
			
			<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<label class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label" for="dimension">Dimension</label>
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
					<input class="form-control" type="text" name="dimension" id="txtDimension">
				</div>
			</div>

		</form>
	</div>

	<div class="box-footer">
		<button id="btnAgregarDimensionTabla" type="button" class="btn btn-primary pull-right">Agregar</button>
	</div>
</div>

<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Dimensiones</h3>
	</div>

	<div class="box-body table-resposive no-padding">
		<table class="table table-hover">
			<thead>
				<tr>
					<th></th>
					<th>Dimensiones</th>
					<th>Opciones</th>
				</tr>
			</thead>

			<tbody id="trTablaDimension"></tbody>
		</table>
	</div>
</div>
