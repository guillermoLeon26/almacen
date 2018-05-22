<script type="text/javascript">

$('#CalculoPrecioMayor').click(function () {
	var arrIdDimensiones = getArrayIdDimensiones();

	$('#formPrecioPorMayor input').val(0);

	if (arrIdDimensiones.length > 0) {
		$('#modalPrecioPorMayor').modal('show');
	}
});

$('#formPrecioPorMayor .ingreso-numero').focusout(function () {
	var costo = parseFloat($('#costo').val());
	var ganancia = parseFloat($('#ganancia').val());
	var descuento = parseFloat($('#descuento').val());
	var subtotal = costo + ganancia;
	var iva = subtotal * parseFloat('{{ $config->IVA }}') / 100;
	var precio = subtotal + iva + descuento;
	var porsentajeGanancia = ganancia * 100 / costo;
	var porsentajeDescuento = descuento * 100 / precio;
	
	$('#costo').val(costo.toFixed(2));
	$('#ganancia').val(ganancia.toFixed(2));
	$('#descuento').val(descuento.toFixed(2));
	$('#resIVA').val(iva.toFixed(2));
	$('#resPrecio').val(precio.toFixed(2));
	$('#porDescuento').val(porsentajeDescuento.toFixed(2));
	$('#porGanancia').val(porsentajeGanancia.toFixed(2));
});

$('#porGanancia').focusout(function () {
	var costo = parseFloat($('#costo').val());
	var porGanancia = parseFloat($('#porGanancia').val());
	var descuento = parseFloat($('#descuento').val());
	var ganancia = costo * porGanancia / 100;
	var subtotal = costo + ganancia;
	var iva = subtotal * parseFloat('{{ $config->IVA }}') / 100;
	var precio = subtotal + iva + descuento;

	$('#porGanancia').val(porGanancia.toFixed(2));
	$('#ganancia').val(ganancia.toFixed(2));
	$('#resIVA').val(iva.toFixed(2));
	$('#resPrecio').val(precio.toFixed(2));
});

$('#porDescuento').focusout(function () {
	var costo = parseFloat($('#costo').val());
	var ganancia = parseFloat($('#ganancia').val());
	var porDescuento = parseFloat($('#porDescuento').val());
	var porIVA = parseFloat('{{ $config->IVA }}');
	var subtotal = costo + ganancia;
	var iva = subtotal * parseFloat('{{ $config->IVA }}') / 100;
	var descuento = (costo + ganancia + iva) / ((100/porDescuento)-1);
	var precio = subtotal + iva + descuento;

	$('#porDescuento').val(porDescuento.toFixed(2));
	$('#descuento').val(descuento.toFixed(2));
	$('#resIVA').val(iva.toFixed(2));
	$('#resPrecio').val(precio.toFixed(2));
});

$('#formPrecioPorMayor').submit(function (e) {
	e.preventDefault();
	var precio = {};
	var dimensiones = getArrayIdDimensiones();

	$(this).find('input[name]').each(function (i, node) {
		precio[node.name] = node.value;
	});
	
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('admin/cont/precio') }}',
		type: 'POST',
		data: {'precio':precio, 'dimensiones':dimensiones},
		dataType: 'json',
		beforeSend: function () {
			$('#formPrecioPorMayor input').prop('disabled', true);
			$('#modalPrecioPorMayor .cerrar').removeAttr('data-dismiss');
			$('#btnGuardarPrecioPorMayor').prop('disabled', true);
			$('#btnGuardarPrecioPorMayor').html('<i class="fa fa-refresh fa-spin"></i>');
		},
		success: function (data) {
			$('#formPrecioPorMayor input').prop('disabled', false);
			$('#modalPrecioPorMayor .cerrar').attr('data-dismiss','modal');
			$('#btnGuardarPrecioPorMayor').prop('disabled', false);
			$('#btnGuardarPrecioPorMayor').html('Guardar');
			$('#modalPrecioPorMayor').modal('hide');
			$("#checkSeleccionarTodo").prop("checked", false);

			buscarDimensiones();
			toastr.success('Se ingresaron los precios correctamente.');
		},
		error: function (data) {
			$('#formPrecioPorMayor input').prop('disabled', false);
			$('#modalPrecioPorMayor .cerrar').attr('data-dismiss','modal');
			$('#btnGuardarPrecioPorMayor').prop('disabled', false);
			$('#btnGuardarPrecioPorMayor').html('Guardar');
			mensaje('error', data, '#mensajeModalPrecioPorMayor');
		}
	});
});

$('#modalPrecioPorMayor').on('hidden.bs.modal', function (e) {
  	$('#mensajeModalPrecioPorMayor').html('');
});

</script>