<div class="box box-primary">			
	<div class="box-body">
		<form class="form-horizontal">
			<div class="form-group col-lg-12 co-md-12 col-sm-12 col-xs-12">
				<label class="col-lg-1 co-md-1 col-sm-2 col-xs-3 control-label" for="categorias">Categoria</label>
				<div class="col-lg-10 col-md-9 col-sm-9 col-xs-7" style="padding-right: 1px;">
					<div id="selCategoria">
						@include('inventario.producto.create.include.cbCategoria')
					</div>
				</div>
	
				<div class="col-lg-1 col-sm-1 col-md-1 col-xs-2" style="padding-left: 0px;">
					<button id="btnModalCategoria" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalIngresarCategoria">
						<span class="fa fa-plus" aria-hidden="true"></span>
					</button>
				</div>
			</div>

			<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<label class="col-sm-2 col-xs-3 control-label" for="marca">Codigo</label>
				<div class="col-sm-10 col-xs-9">
					<input class="form-control" type="text" name="codigo" id="codigo">
				</div>
			</div>

			<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<label class="col-sm-2 col-xs-3 control-label" for="marca">Marca</label>
				<div class="col-sm-8 col-xs-7" style="padding-right: 1px;">
					<div id="selMarca">
						@include('inventario.producto.create.include.cbMarca')
					</div>
				</div>

				<div class="col-sm-1 col-xs-1" style="padding-left: 0px;">
					<button id="btnModalMarca" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalIngresarMarca">
						<span class="fa fa-plus" aria-hidden="true"></span>
					</button>
				</div>
			</div>

			<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<label class="col-sm-2 col-md-2 col-xs-3 control-label" for="unidad">Unidad</label>
				<div class="col-md-7 col-sm-8 col-xs-7" style="padding-right: 1px;">
					<div id="selUnidad">
						@include('inventario.producto.create.include.cbUnidad')
					</div>
				</div>
				
				<div class="col-sm-1 col-xs-1" style="padding-left: 0px;">
					<button id="btnModalUnidad" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalIngresarUnidad">
						<span class="fa fa-plus" aria-hidden="true"></span>
					</button>
				</div>
			</div>

			<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<label class="col-md-1 control-label" for="marca">Descripción</label>
				<textarea class="form-control" name="descripcion" rows="3" style="margin-left: 12px;"></textarea>
			</div>
		</form>
	</div>

</div>