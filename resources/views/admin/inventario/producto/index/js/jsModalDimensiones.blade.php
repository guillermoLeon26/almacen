<script type="text/javascript">

function modalDimensiones(id) {
	idProducto = id;
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto') }}/' + id,
		type: 'GET',
		dataType: 'json',
		beforeSend: function () {
			$('.box').append('<div class="overlay">'+
              					'<i class="fa fa-refresh fa-spin"></i>'+
            				'</div>');
		},
		success: function (data) {
			imprimirTablaDimensiones(data.producto.dimensiones);
			$('.overlay').detach();
			$('#idProducto').val(id);
			$('#modalDimensiones').modal('show');
		},
		error: function (data) {
			$('.overlay').detach();
			mensaje2('error', 'Ocurrio un error en la conexión.', '#mensaje');
		}
	});
}

function imprimirTablaDimensiones(dimensiones) {

	var fila = '';

	$.each(dimensiones, function (i, dimension) {
		fila += '<tr>'+
					'<td>'+
						'<button onclick="moverAbajoFilaDimension('+dimension.id+')" type="button" class="btn btn-warning">'+
							'<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>'+
						'</button>'+

						'<button onclick="moverArribaFilaDimension('+dimension.id+')" type="button" class="btn btn-warning">'+
							'<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>'+
						'</button>'+
					'</td>'+
					'<td>'+
						dimension.dimension+
					'</td>'+
				'</tr>';
	});

	$('#tbodyTablaDimension').html(fila);
}

function moverAbajoFilaDimension(idDimension) {
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/stock') }}/'+idDimension,
		type: 'PUT',
		data: {'mover':'abajo'},
		dataType: 'json',
		beforeSend: function () {
			$('#formAgregarDimension .form-control').prop('disabled', true);
		 	$('#formAgregarDimension .btn').prop('disabled', true);
		 	$('#modalDimensiones .cerrar').removeAttr('data-dismiss');
			$('.box').append('<div class="overlay">'+
              									'<i class="fa fa-refresh fa-spin"></i>'+
            								   '</div>');
		},
		success: function (data) {
			$('#formAgregarDimension .form-control').prop('disabled', false);
		 	$('#formAgregarDimension .btn').prop('disabled', false);
		 	$('#modalDimensiones .cerrar').attr('data-dismiss','modal');
			$('.overlay').detach();
			modalDimensiones(idProducto);
		},
		error: function (data) {
			$('#formAgregarDimension .form-control').prop('disabled', false);
		 	$('#formAgregarDimension .btn').prop('disabled', false);
		 	$('#modalDimensiones .cerrar').attr('data-dismiss','modal');
			$('.overlay').detach();
			mensaje2('error', 'Ocurrio un error con la conexión.', '#mensajeModalDimensiones');
		}
	});
}

function moverArribaFilaDimension(idDimension) {
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/stock') }}/'+idDimension,
		type: 'PUT',
		data: {'mover':'arriba'},
		dataType: 'json',
		beforeSend: function () {
			$('#formAgregarDimension .form-control').prop('disabled', true);
		 	$('#formAgregarDimension .btn').prop('disabled', true);
		 	$('#modalDimensiones .cerrar').removeAttr('data-dismiss');
			$('#modalDimensiones .box').append('<div class="overlay">'+
              									'<i class="fa fa-refresh fa-spin"></i>'+
            								   '</div>');
		},
		success: function (data) {
			$('#formAgregarDimension .form-control').prop('disabled', false);
		 	$('#formAgregarDimension .btn').prop('disabled', false);
		 	$('#modalDimensiones .cerrar').attr('data-dismiss','modal');
			$('.overlay').detach();
			modalDimensiones(idProducto);
		},
		error: function (data) {
			$('#formAgregarDimension .form-control').prop('disabled', false);
		 	$('#formAgregarDimension .btn').prop('disabled', false);
		 	$('#modalDimensiones .cerrar').attr('data-dismiss','modal');
			$('.overlay').detach();
			mensaje2('error', 'Ocurrio un error con la conexión.', '#mensajeModalDimensiones');
		}
	});
}

$('#formAgregarDimension').submit(function (e) {
	e.preventDefault();
	var datos = $(this).serialize();

	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/stock') }}',
		type: 'POST',
		data: datos,
		dataType: 'json',
		beforeSend: function () {
			$('#formAgregarDimension .form-control').prop('disabled', true);
		 	$('#formAgregarDimension .btn').prop('disabled', true);
		 	$('#modalDimensiones .cerrar').removeAttr('data-dismiss');
			$('#modalDimensiones .box').append('<div class="overlay">'+
              									'<i class="fa fa-refresh fa-spin"></i>'+
            								   '</div>');
		},
		success: function (data) {
			$('#formAgregarDimension .form-control').prop('disabled', false);
		 	$('#formAgregarDimension .btn').prop('disabled', false);
		 	$('#modalDimensiones .cerrar').attr('data-dismiss','modal');
			$('.overlay').detach();
			imprimirTablaDimensiones(data.producto.dimensiones);
			mensaje2('ok', data.mensaje, '#mensajeModalDimensiones');
		},
		error: function (data) {
			$('#formAgregarDimension .form-control').prop('disabled', false);
		 	$('#formAgregarDimension .btn').prop('disabled', false);
		 	$('#modalDimensiones .cerrar').attr('data-dismiss','modal');
			$('.overlay').detach();
			mensaje('error', data, '#mensajeModalDimensiones');
		}
	});
});

</script>