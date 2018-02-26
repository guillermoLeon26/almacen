<script type="text/javascript">
	
$('#formCrearEnvio').submit(function (e) {
	e.preventDefault();
	var datos = {};
	var items_compras_id = [];
	var product_id = [];
	var product_stock_id = [];
	var stock_id = [];
	var color = [];
	var cantidad = [];
	var cantidadDisponible = [];
	var items = {};

	$(this).find('#tabDatos input[name]').each(function (i, node) {
		datos[node.name] = node.value;
	});
	datos['store_id'] = $('#selSucursales').val();

	$(this).find('#tabItems .box .items_compras_id').each(function (i, node) {
		items_compras_id.push(node.value);
	});

	$(this).find('#tabItems .box .product_id').each(function (i, node) {
		product_id.push(node.value);
	});

	$(this).find('#tabItems .box .product_stock_id').each(function (i, node) {
		product_stock_id.push(node.value);
	});

	$(this).find('#tabItems .box .stock_id').each(function (i, node) {
		stock_id.push(node.value);
	});

	$(this).find('#tabItems .box .color').each(function (i, node) {
		color.push(node.value);
	});

	$(this).find('#tabItems .box .cantidadDisponible').each(function (i, node) {
		cantidadDisponible.push(node.value);
	});

	$(this).find('#tabItems .box .cantidad').each(function (i, node) {
		cantidad.push(node.value);
	});

	items['items_compras_id'] = items_compras_id;
	items['product_id'] = product_id;
	items['product_stock_id'] = product_stock_id;
	items['stock_id'] = stock_id;
	items['color'] = color;
	items['cantidadDisponible'] = cantidadDisponible;
	items['cantidad'] = cantidad;

	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/enviosCompras') }}',
		type: 'POST',
		data: {'datos':datos, 'items':items},
		dataType: 'json',
		beforeSend: function () {
			$('.box').append('<div class="overlay">'+
              					'<i class="fa fa-refresh fa-spin"></i>'+
            				'</div>');
			$('#btnGuardar').prop('disabled', true);
			$('#btnGuardar').html('<i class="fa fa-refresh fa-spin"></i>');
		},
		success: function (data) {
			$('.overlay').detach();
			$('#btnGuardar').html('<span class="fa fa-save" aria-hidden="true"></span>');
			mensaje('ok', data, '#mensaje');
		},
		error: function (data) {
			$('.overlay').detach();
			$('#btnGuardar').prop('disabled', false);
			$('#btnGuardar').html('<span class="fa fa-save" aria-hidden="true"></span>');
			mensaje('error', data, '#mensaje');
		}
	});

});

</script>