<script type="text/javascript">

function modalColores(id) {
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
			imprimirTablaColores(id, data.colores);
		},
		error: function (data) {
			$('.overlay').detach();
			mensaje2('error', 'Ocurrio un error en la conexión.', '#mensaje');
		}
	});
}

function imprirCbColor(colores) {
	var html = '<select class="form-control select2" style="width: 100%;" id="comboBoxColor">'

	$.each(colores, function (i, color) {
		html += '<option value="'+color.color+'">'+color.color+'</option>'
	});
	
	html += '</select>'
	$('#selColor').html(html);
}

function imprimirTablaColores(id, colores) {
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto') }}/'+id,
		type: 'GET',
		data: {'info':'tablaColores'},
		dataType: 'json',
		success: function (data) {
			imprirCbColor(colores);		
			$('.select2').select2({
				dropdownParent: $('#modalColor')
			});
			dibujarTablaColores(data.producto.colores);
			$('.overlay').detach();
			$('#modalColor').modal('show');
			
		},
		error: function (data) {
			$('.overlay').detach();
			mensaje2('error', 'Ocurrio un error en la conexión.', '#mensaje');
		}
	});
}

function dibujarTablaColores(colores) {
	var html = '<div class="box-body table-responsive no-padding">'
				+'<table class="table table-hover">'
					+'<thead>'
						+'<tr>'
							+'<th>Colores</th>'
						+'</tr>'
					+'</thead>'
					+'<tbody>';
	$.each(colores, function (i, color) {
		html +=  '<tr>'
					+'<td>'+color+'</td>'
				+'</tr>'
	});
	
	html += '</tbody>'
		'</table>'
	'</div>';
	
	$('#tablaColores').html(html);
}

$('#btnModalColor').click(function () {
	$('#modalColor').modal('hide');
	$('#modalIngresarColor').modal('show');
});

$('#modalIngresarColor .cerrar').click(function () {
	$('#modalColor').modal('show');
});

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
		 		actualizarCbColor();
		 		$('#modalColor').modal('show');
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
			$('.select2').select2({
				dropdownParent: $('#modalColor')
			});
		},
		error: function (data) {
			$('#btnModalColor').prop('disabled', false);
			$('#btnModalColor').html('<span class="fa fa-plus" aria-hidden="true"></span>');
			$('#color').prop("disabled", false);
			mensaje('error', data, '#mensajeModalColor');
		}
	});
}
//----------------------------------------------------------
//---------------AGREGAR COLOR AL PRODUCTO----------------
$('#btnAgregarColor').click(function () {
	var color = $('#comboBoxColor').val();
	
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto/updateColors') }}/'+idProducto,
		type: 'PUT',
		data: {'color' : color, 'idProducto':idProducto},
		dataType: 'json',
		beforeSend: function () {
			$('#actualizarColoresProducto .box').append('<div class="overlay">'+
              												'<i class="fa fa-refresh fa-spin"></i>'+
            											'</div>');
		},
		success: function (data) {
			dibujarTablaColores(data.colores);
			$('.overlay').detach();
			$('#modalColor').modal('hide');
			mensaje('ok', data, '#mensaje');
		},
		error: function (data) {
			$('.overlay').detach();
			if (data.status == 500) {
				mensaje2('error', 'Ocurrio un error en la conexión.', '#mensajeModalColor');
			} else {
				mensaje('error', data, '#mensajeModalColor');	
			}
			
			
		}
	});
});

</script>