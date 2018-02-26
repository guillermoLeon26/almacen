<div class="box box-success">
	
	<div class="box-body">
		
		<div class="form-group col-xs-12">
			<label class="control-label col-sm-3">Sucursales</label>
			<div class="col-sm-9">
				<select class="form-control" id="selSucursales" name="store_id" style="width: 100%;">
					@foreach($empresa->sucursales() as $sucursal)
						<option value="{{ $sucursal->id }}">{{ $sucursal->direccion.','.$sucursal->ciudad }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-group col-xs-12">
			<label class="control-label col-sm-3">Fecha de Envío</label>
			<div class="col-sm-9">
				<div class="input-group date">
					<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
					<input type="text" class="form-control pull-right fecha" name="fecha">
				</div>
			</div>

			<input type="hidden" name="compra_id" value="{{ $compra->id }}">
		</div>

	</div>
	
</div>
