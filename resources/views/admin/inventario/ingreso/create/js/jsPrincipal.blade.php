<script type="text/javascript">
	
$('#formGuardar').submit(function (e) {
	e.preventDefault();
	var datos = {};
	var items = {};

	datos['envio_id'] = $(this).find('#envio_id').val();
	datos['fecha'] = $(this).find('#fecha').val();
	datos['ubicacion'] = $(this).find('#ubicacion').val();

	items['idProducto'] = idProducto.filter(quitarNull);
	items['idStock'] = idStock.filter(quitarNull);
	items['color'] = color.filter(quitarNull);
	items['cantProducto'] = cantProducto.filter(quitarNull);

	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/ingreso') }}',
		type: 'POST',
		data: {'datos':datos, 'items':items},
		dataType: 'json',
		/*beforeSend: function () {
			$('.box').append('<div class="overlay">'+
              					'<i class="fa fa-refresh fa-spin"></i>'+
            				'</div>');
			$('#btnGuardar').prop('disabled', true);
			$('#btnGuardar').html('<i class="fa fa-refresh fa-spin"></i>');
		},*/
		success: function (data) {
			//$('.overlay').detach();
			//$('#btnGuardar').html('<span class="fa fa-save" aria-hidden="true"></span>');
			//mensaje('ok', data, '#mensaje');
		},
		error: function (data) {
			//$('.overlay').detach();
			//$('#btnGuardar').prop('disabled', false);
			//$('#btnGuardar').html('<span class="fa fa-save" aria-hidden="true"></span>');
			mensaje('error', data, '#mensaje');
		}
	});
});

function quitarNull(item) {
	return item != null;
}

</script>