<script type="text/javascript">

$('#categorias').select2();

$('#marca').select2();

$('#unidad').select2();

$('#comboBoxColor').select2();

$("#imagenes").fileinput({
    showUpload: false,
    layoutTemplates: {actionUpload: ''}, // disable thumbnail updating
    maxFileCount: 3,
    language: "es",
    theme: "fa",
    uploadUrl: "/file-upload-batch/2",
    browseLabel: "Escojer imagenes",
    allowedFileTypes: ["image"],
    maxImageWidth: 242,
    maxImageHeight: 200,
    maxFileSize: 400, //400KB
    resizePreference: 'height',
    resizeImage: true
});
//------------------------------------------------------------
//-----------------------GUARDAR PRODUCTO------------------------ 
$('#formCrearProducto').submit(function (e) {
	e.preventDefault();
	var unidades = $('#unidad option:selected').html();
	var datos = $(this).serialize()+'&unidades='+unidades;

	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto') }}',
		type: 'POST',
		data: datos,
		dataType: 'json',
		beforeSend: function () {
			$('#btnGuardar').prop('disabled', true);
			$('#btnGuardar').html('<i class="fa fa-refresh fa-spin"></i>');
		},
		success: function (data) {
			$('#btnGuardar').html('Guardar');
			mensaje('ok', data, '#mensaje');
		},
		error: function (data) {
			$('#btnGuardar').prop('disabled', false);
			$('#btnGuardar').html('Guardar');
			mensaje('error', data, '#mensaje');
		}
	});
});

//------------------------------------------------------------
//------------------------GUARDAR----------------------------- 
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
		 		mensaje('ok', data, '#mensaje');
		 		actualizarCbMarca();
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
	//----------------------------------------------------------------------------
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
		 		mensaje('ok', data, '#mensaje');
		 		actualizarCbUnidad();
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
	//-------------------------------------------------------------------------
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
		 		mensaje('ok', data, '#mensaje');
		 		actualizarCbCategoria();
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
//-------------------------------------------------------------------------
	$('#formIngresoColor').submit(function (e) {
		e.preventDefault();
		var datos = $(this).serialize();
		
		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
			url: '{{ url('inventario/configuracion/Color') }}',
		 	type: 'POST',
		 	data: datos,
		 	dataType: 'json',
		 	beforeSend: function () {
		 		$('#formIngresoColor .form-control').prop('disabled', true);
		 		$('#btnIngresoColor').prop('disabled', true);
		 		$('#btnIngresoColor').html('<i class="fa fa-refresh fa-spin"></i>');
		 		$('#modalIngresarColor .cerrar').removeAttr('data-dismiss');
		 	},
		 	success: function (data) {
		 		$('#formIngresoColor .form-control').prop('disabled', false);
		 		$('#formIngresoColor .form-control').val('');
		 		$('#btnIngresoColor').prop('disabled', false);
		 		$('#btnIngresoColor').html('Ingresar');
		 		$('#modalIngresarColor .cerrar').attr('data-dismiss','modal');
		 		$('#modalIngresarColor').modal('hide');
		 		mensaje('ok', data, '#mensaje');
		 		actualizarCbColor();
		 	},
		 	error: function (data) {
		 		$('#formIngresoColor .form-control').prop('disabled', false);
		 		$('#btnIngresoColor').prop('disabled', false);
		 		$('#btnIngresoColor').html('Ingresar');
		 		$('#modalIngresarColor .cerrar').attr('data-dismiss','modal');
		 		mensaje('error', data, '#mensajeIngresoColor');
		 	}
		});
	});
//----------------------------------------------------------
//-----------------ACTUALIZAR COMBO BOX MARCA----------------
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
//----------------------------------------------------------
//---------------ACTUALIZAR COMBO BOX UNIDAD----------------
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
//----------------------------------------------------------
//---------------ACTUALIZAR COMBO BOX CATEGORIA----------------
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
//----------------------------------------------------------
//---------------ACTUALIZAR COMBO BOX COLOR----------------
function actualizarCbColor() {
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto/cbColor') }}',
		type: 'POST',
		dataType: 'json',
		beforeSend: function () {
			$('#btnModalColor').prop('disabled', true);
			$('#btnModalColor').html('<i class="fa fa-refresh fa-spin"></i>');
			$('#color').prop("disabled", true);
		},
		success: function (data) {
			$('#btnModalColor').prop('disabled', false);
			$('#btnModalColor').html('<span class="fa fa-plus" aria-hidden="true"></span>');
			$('#selColor').html(data);
			$('#color').select2();
		},
		error: function (data) {
			$('#btnModalColor').prop('disabled', false);
			$('#btnModalColor').html('<span class="fa fa-plus" aria-hidden="true"></span>');
			$('#color').prop("disabled", false);
			mensaje('error', data, '#mensaje');
		}
	});
}
//----------------------------------------------------------
//-------------------AGREAGAR COLOR A LA TABLA COLORES------------
var contColor = 0;

$('#btnAgregarColorTabla').click(function () {
	var color = $('#comboBoxColor').val();

	if (esValidoIngresarColor(color)) {
		ingresarColorTabla(color);	
	} else {
		var msj = 'Ya se encuentra el color en la tabla';

		mensaje2('error', msj, '#mensaje');
	}
	
});

function ingresarColorTabla(color) {

	var fila = '<tr id="fila'+contColor+'">'+
					'<td>'+
						'<input type="hidden" name="colores[]" value="'+color+'">'+
						color+
					'</td>'+
					'<td>'+
						'<button onclick="eliminarFilaColor('+contColor+')" type="button" class="btn btn-danger">'+
							'<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>'+
						'</button>'+
					'</td>'+
				'</tr>';
	contColor++;
	$('#trTablaColores').append(fila);
}

function eliminarFilaColor(index) {
	$('#fila'+index).remove();
}

function esValidoIngresarColor(color) {
	var cantidad = $('#trTablaColores tr').length;

	for (var i = 0; i < cantidad; i++) {
		var colorTabla = $('#trTablaColores tr').eq(i).find('input').val();
		
		if (color.localeCompare(colorTabla) == 0) {
			return false;
		}
	}
	return true;
}
//----------------------------------------------------------------
//--------------AGREAGAR DIMENSION A LA TABLA DIMENSIONES------------
var contDimension = 0;

$('#btnAgregarDimensionTabla').click(function () {
	var dimension = $('#txtDimension').val();

	if (esValidoIngresarDimension(dimension)) {
		ingresarDimensionTabla(dimension);	
	} else {
		var msj = 'Ya se encuentra la dimensión en la tabla';

		mensaje2('error', msj, '#mensaje');
	}
	
});

function ingresarDimensionTabla(dimension) {

	var fila = '<tr id="filaDimension'+contDimension+'">'+
					'<td>'+
						'<button onclick="moverArribaFilaDimension('+contDimension+')" type="button" class="btn btn-warning">'+
							'<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>'+
						'</button>'+

						'<button onclick="moverAbajoFilaDimension('+contDimension+')" type="button" class="btn btn-warning">'+
							'<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>'+
						'</button>'+
					'</td>'+
					'<td>'+
						'<input type="hidden" name="dimensiones[]" value="'+dimension+'">'+
						dimension+
					'</td>'+
					'<td>'+
						'<button onclick="eliminarFilaDimension('+contDimension+')" type="button" class="btn btn-danger">'+
							'<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>'+
						'</button>'+
					'</td>'+
				'</tr>';

	contDimension++;
	$('#trTablaDimension').append(fila);
	$('#txtDimension').val('');
}

function eliminarFilaDimension(index) {
	$('#filaDimension'+index).remove();
}

function esValidoIngresarDimension(dimension) {
	var cantidad = $('#trTablaDimension tr').length;

	for (var i = 0; i < cantidad; i++) {
		var dimensionTabla = $('#trTablaDimension tr').eq(i).find('input').val();
		
		if (dimension.localeCompare(dimensionTabla) == 0) {
			return false;
		}
	}
	return true;
}

function moverAbajoFilaDimension(index) {

	if ($('#filaDimension'+index).next().is('tr')) {
		var filaActual = '<tr id="filaDimension'+index+'">'+
							$('#filaDimension'+index).html()+
						 '</tr>';

		var filaSiguiente = $('#filaDimension'+index).next();

		$('#filaDimension'+index).remove();
		filaSiguiente.after(filaActual);
	} 
}

function moverArribaFilaDimension(index) {

	if ($('#filaDimension'+index).prev().is('tr')) {
		var filaActual = '<tr id="filaDimension'+index+'">'+
							$('#filaDimension'+index).html()+
						 '</tr>';
		var filaAnterior = $('#filaDimension'+index).prev();

		$('#filaDimension'+index).remove();
		filaAnterior.before(filaActual);
	} 
}
//----------------------------------------------------------------
//---------------------MENSAJE------------------------------
	function mensaje(tipo, data, lugar) {
		var tipoAlerta, icono, titulo, html, mensajes='';

		if (tipo == 'ok') {
			tipo = 'alert alert-success alert-dismissible';
			icono = 'icon fa fa-check';
			titulo = 'Exito!';
			mensajes = data.mensaje;

		}else if (tipo == 'error') {
			tipo = 'alert alert-danger alert-dismissible';
			icono = 'icon fa fa-ban';
			titulo = 'Alerta!';
			var arrayMensajes = data.responseJSON;
			mensajes = '<ul>';
			$.each(arrayMensajes, function (i, reg) {
				mensajes +=	'<li>'+reg+'</li>';
			});
			mensajes += '</ul>';
		}

		var html = 	'<div class="'+tipo+'">'+
		            	'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
		            	'<h4><i class="'+icono+'"></i> '+titulo+'</h4>'+
		            	mensajes+
		            '</div>';
		        	
		$(lugar).html(html); 
	}

	function mensaje2(tipo, mensaje, lugar) {
		var tipoAlerta, icono, titulo, html, mensajes='';

		if (tipo == 'ok') {
			tipo = 'alert alert-success alert-dismissible';
			icono = 'icon fa fa-check';
			titulo = 'Exito!';
		}else if (tipo == 'error') {
			tipo = 'alert alert-danger alert-dismissible';
			icono = 'icon fa fa-ban';
			titulo = 'Alerta!';
		}

		var html = 	'<div class="'+tipo+'">'+
		            	'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
		            	'<h4><i class="'+icono+'"></i> '+titulo+'</h4>'+
		            	mensaje+
		            '</div>';
		        	
		$(lugar).html(html); 
	}

</script>