<script type="text/javascript">

var idProducto;

function modalDatos(id) {
	idProducto = id;
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto/create') }}',
		type: 'GET',
		dataType: 'json',
		beforeSend: function () {
			$('.box').append('<div class="overlay">'+
              					'<i class="fa fa-refresh fa-spin"></i>'+
            				'</div>');
		},
		success: function (data) {
			imprimirCbCategoria(data.categorias);
			imprimirCbMarca(data.marcas);
			imprirCbUnidad(data.unidades);
			$('.select2').select2({
				dropdownParent: $('#modalDatos')
			});
			setearCampos(id);
		},
		error: function (data) {
			$('.overlay').detach();
			mensaje2('error', 'Ocurrio un error en la conexión.', '#mensaje');
		}
	});
}

function setearCampos(id) {
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto') }}/' + id,
		type: 'GET',
		dataType: 'json',
		success: function (data) {
			$('.overlay').detach();
			idsCategoria = idsCategorias(data.producto.categorias);
			$('#categorias').val(idsCategoria).trigger('change');
			$('#codigo').val(data.producto.codigo);
			$('#marca').val(data.producto.marca).trigger('change');
			$('#unidad').val(data.producto.simbolo).trigger('change');
			$('#descripcion').val(data.producto.descripcion);
			$('#modalDatos').modal('show');
		},
		error: function (data) {
			$('.overlay').detach();
			mensaje2('error', 'Ocurrio un error en la conexión.', '#mensaje');
		}
	});
}

function idsCategorias(categorias) {
	var ids = new Array();

	$.each(categorias, function (i, categoria) {
		ids.push(categoria.id);
	});

	return ids;
}

function imprimirCbCategoria(categorias) {
	var html = '<select class="form-control select2" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple name="categorias[]" id="categorias">';
	
	$.each(categorias, function (i, categoria ) {
		html += '<option value="'+categoria.id+'">'+categoria.categoria+'</option>';
	});

	html += '</select>';

	$('#selCategoria').html(html);
}

function imprimirCbMarca(marcas) {
	var html = '<select class="form-control select2" style="width: 100%;" name="marca" id="marca">';
	
	$.each(marcas, function (i, marca) {
		html += '<option value="'+marca.marca+'">'+marca.marca+'</option>';
	});
	
	html += '</select>';
	
	$('#selMarca').html(html);
}

function imprirCbUnidad(unidades) {
	var html = '<select class="form-control select2" style="width: 100%;" name="simbolo" id="unidad">';
	
	$.each(unidades, function (i, unidad) {
		html += '<option value="'+unidad.simbolo+'">'+unidad.unidad+'</option>';
	});

	html += '</select>';

	$('#selUnidad').html(html);
}

//-----------------------------------MARCA----------------------------------------
$('#btnModalMarca').click(function () {
	$('#modalDatos').modal('hide');
	$('#modalIngresarMarca').modal('show');
});

	$('#formIngresoMarca').submit(function (e) {
		e.preventDefault();
		var datos = $(this).serialize();
		
		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
			url: '{{ url('inventario/configuracion/marca') }}',
		 	type: 'POST',
		 	data: datos,
		 	dataType: 'json',
		 	beforeSend: function () {
		 		$('#formIngresoMarca .form-control').prop('disabled', true);
		 		$('#btnIngresoMarca').prop('disabled', true);
		 		$('#btnIngresoMarca').html('<i class="fa fa-refresh fa-spin"></i>');
		 		$('#modalIngresarMarca .cerrar').removeAttr('data-dismiss');
		 	},
		 	success: function (data) {
		 		$('#formIngresoMarca .form-control').prop('disabled', false);
		 		$('#formIngresoMarca .form-control').val('');
		 		$('#btnIngresoMarca').prop('disabled', false);
		 		$('#btnIngresoMarca').html('Ingresar');
		 		$('#modalIngresarMarca .cerrar').attr('data-dismiss','modal');
		 		$('#modalIngresarMarca').modal('hide');
		 		mensaje('ok', data, '#mensajeModalDatos');
		 		actualizarCbMarca();
		 		modalDatos(idProducto);
		 	},
		 	error: function (data) {
		 		$('#formIngresoMarca .form-control').prop('disabled', false);
		 		$('#btnIngresoMarca').prop('disabled', false);
		 		$('#btnIngresoMarca').html('Ingresar');
		 		$('#modalIngresarMarca .cerrar').attr('data-dismiss','modal');
		 		mensaje('error', data, '#mensajeIngresoMarca');
		 	}
		});
	});

function actualizarCbMarca() {
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto/cbMarca') }}',
		type: 'POST',
		dataType: 'json',
		beforeSend: function () {
			$('#btnModalMarca').prop('disabled', true);
			$('#btnModalMarca').html('<i class="fa fa-refresh fa-spin"></i>');
			$('#marca').prop("disabled", true);
		},
		success: function (data) {
			$('#btnModalMarca').prop('disabled', false);
			$('#btnModalMarca').html('<span class="fa fa-plus" aria-hidden="true"></span>');
			$('#selMarca').html(data);
			$('#marca').select2();
		},
		error: function (data) {
			$('#btnModalMarca').prop('disabled', false);
			$('#btnModalMarca').html('<span class="fa fa-plus" aria-hidden="true"></span>');
			$('#marca').prop("disabled", false);
			mensaje('error', data, '#mensaje');
		}
	});
}

$('#modalIngresarMarca .cerrar').click(function () {
  $('#modalDatos').modal('show');
});
//---------------------------------------------------------------------------------
//--------------------------------------CATEGORIA----------------------------------
$('#btnModalCategoria').click(function () {
	$('#modalDatos').modal('hide');
	$('#modalIngresarCategoria').modal('show');
});

	$('#formIngresoCategoria').submit(function (e) {
		e.preventDefault();
		var datos = $(this).serialize();
		
		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
			url: '{{ url('inventario/configuracion/categoria') }}',
		 	type: 'POST',
		 	data: datos,
		 	dataType: 'json',
		 	beforeSend: function () {
		 		$('#formIngresoCategoria .form-control').prop('disabled', true);
		 		$('#btnIngresoCategoria').prop('disabled', true);
		 		$('#btnIngresoCategoria').html('<i class="fa fa-refresh fa-spin"></i>');
		 		$('#modalIngresarCategoria .cerrar').removeAttr('data-dismiss');
		 	},
		 	success: function (data) {
		 		$('#formIngresoCategoria .form-control').prop('disabled', false);
		 		$('#formIngresoCategoria .form-control').val('');
		 		$('#btnIngresoCategoria').prop('disabled', false);
		 		$('#btnIngresoCategoria').html('Ingresar');
		 		$('#modalIngresarCategoria .cerrar').attr('data-dismiss','modal');
		 		$('#modalIngresarCategoria').modal('hide');
		 		mensaje('ok', data, '#mensajeModalDatos');
		 		actualizarCbCategoria();
		 		modalDatos(idProducto);
		 		
		 	},
		 	error: function (data) {
		 		$('#formIngresoCategoria .form-control').prop('disabled', false);
		 		$('#btnIngresoCategoria').prop('disabled', false);
		 		$('#btnIngresoCategoria').html('Ingresar');
		 		$('#modalIngresarCategoria .cerrar').attr('data-dismiss','modal');
		 		mensaje('error', data, '#mensajeIngresoCategoria');
		 	}
		});
	});

function actualizarCbCategoria() {
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto/cbCategoria') }}',
		type: 'POST',
		dataType: 'json',
		beforeSend: function () {
			$('#btnModalCategoria').prop('disabled', true);
			$('#btnModalCategoria').html('<i class="fa fa-refresh fa-spin"></i>');
			$('#categorias').prop("disabled", true);
		},
		success: function (data) {
			$('#btnModalCategoria').prop('disabled', false);
			$('#btnModalCategoria').html('<span class="fa fa-plus" aria-hidden="true"></span>');
			$('#selCategoria').html(data);
			$('#categorias').select2();
		},
		error: function (data) {
			$('#btnModalCategoria').prop('disabled', false);
			$('#btnModalCategoria').html('<span class="fa fa-plus" aria-hidden="true"></span>');
			$('#categorias').prop("disabled", false);
			mensaje('error', data, '#mensaje');
		}
	});
}

$('#modalIngresarCategoria .cerrar').click(function () {
  $('#modalDatos').modal('show');
});
//-----------------------------------------------------------------------------------
//--------------------------------INGRESO UNIDAD-------------------------------------
$('#btnModalUnidad').click(function () {
	$('#modalDatos').modal('hide');
	$('#modalIngresarUnidad').modal('show');
});

	$('#formIngresoUnidad').submit(function (e) {
		e.preventDefault();
		var datos = $(this).serialize();
		
		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
			url: '{{ url('inventario/configuracion/unidad') }}',
		 	type: 'POST',
		 	data: datos,
		 	dataType: 'json',
		 	beforeSend: function () {
		 		$('#formIngresoUnidad .form-control').prop('disabled', true);
		 		$('#btnIngresoUnidad').prop('disabled', true);
		 		$('#btnIngresoUnidad').html('<i class="fa fa-refresh fa-spin"></i>');
		 		$('#modalIngresarUnidad .cerrar').removeAttr('data-dismiss');
		 	},
		 	success: function (data) {
		 		$('#formIngresoUnidad .form-control').prop('disabled', false);
		 		$('#formIngresoUnidad .form-control').val('');
		 		$('#btnIngresoUnidad').prop('disabled', false);
		 		$('#btnIngresoUnidad').html('Ingresar');
		 		$('#modalIngresarUnidad .cerrar').attr('data-dismiss','modal');
		 		$('#modalIngresarUnidad').modal('hide');
		 		mensaje('ok', data, '#mensajeModalDatos');
		 		actualizarCbUnidad();
		 		modalDatos(idProducto);
		 	},
		 	error: function (data) {
		 		$('#formIngresoUnidad .form-control').prop('disabled', false);
		 		$('#btnIngresoUnidad').prop('disabled', false);
		 		$('#btnIngresoUnidad').html('Ingresar');
		 		$('#modalIngresarUnidad .cerrar').attr('data-dismiss','modal');
		 		mensaje('error', data, '#mensajeIngresoUnidad');
		 	}
		});
	});

function actualizarCbUnidad() {
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto/cbUnidad') }}',
		type: 'POST',
		dataType: 'json',
		beforeSend: function () {
			$('#btnModalUnidad').prop('disabled', true);
			$('#btnModalUnidad').html('<i class="fa fa-refresh fa-spin"></i>');
			$('#unidad').prop("disabled", true);
		},
		success: function (data) {
			$('#btnModalUnidad').prop('disabled', false);
			$('#btnModalUnidad').html('<span class="fa fa-plus" aria-hidden="true"></span>');
			$('#selUnidad').html(data);
			$('#unidad').select2();
		},
		error: function (data) {
			$('#btnModalUnidad').prop('disabled', false);
			$('#btnModalUnidad').html('<span class="fa fa-plus" aria-hidden="true"></span>');
			$('#unidad').prop("disabled", false);
			mensaje('error', data, '#mensaje');
		}
	});
}

$('#modalIngresarUnidad .cerrar').click(function () {
  $('#modalDatos').modal('show');
})
//----------------------------------------------------------------------------------------
//------------------------------ACTUALIZAR PRODUCTO---------------------------------

$('#actualizarDatosProducto').submit(function (e) {
	e.preventDefault();
	var unidades = $('#unidad option:selected').html();
	var datos = $(this).serialize()+'&unidades='+unidades;
	
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto') }}/'+idProducto,
		type: 'PUT',
		data: datos,
		dataType: 'json',
		beforeSend: function () {
			$('#modalDatos .form-control').prop('disabled', true);
			$('#modalDatos .btn').prop('disabled', true);
		 	$('#btnModificarDatosProducto').html('<i class="fa fa-refresh fa-spin"></i>');
		 	$('#modalDatos .cerrar').removeAttr('data-dismiss');
		},
		success: function (data) {
			var page = ($('.pagination a').length == 0)?1:$('.pagination a').attr('href').split('page=')[1];
			var filtro = $('#buscar').val();

			$('#modalDatos .form-control').prop('disabled', false);
			$('#modalDatos .btn').prop('disabled', false);
		 	$('#btnModificarDatosProducto').html('Guardar');
		 	$('#modalDatos .cerrar').attr('data-dismiss','modal');
			
			$('#modalDatos').modal('hide');
			generarTabla(page, filtro);
			mensaje2('ok', data.mensaje, '#mensaje');
		},
		error: function (data) {
			$('#modalDatos .form-control').prop('disabled', false);
			$('#modalDatos .btn').prop('disabled', false);
		 	$('#btnModificarDatosProducto').html('Guardar');
		 	$('#modalDatos .cerrar').attr('data-dismiss','modal');
			mensaje2('error', 'No se ingreso el producto ocurrio un error en la conexión.', '#mensajeModalDatos');
		}
	});
});

</script>