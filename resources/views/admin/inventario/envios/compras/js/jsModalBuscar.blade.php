<script type="text/javascript">

$('.fecha').datepicker({
    autoclose: true,
    language: 'es',
    todayHighlight: true
});

$('#selSucursales').select2({
	placeholder: 'Ninguno',
	allowClear: true,
	dropdownParent: $('#modalBuscar'),
	templateSelection: formatRepo,
	templateResult: formatSucursal
});

function formatRepo(sucursal) {
	if (!sucursal.id) { return sucursal.text; }

	  var arr = sucursal.text.split(',');

	  var $sucursal = $(
	  	'<span><strong>Direccion: </strong>'+arr["0"]+', <strong>Ciudad: </strong>'+arr["1"]+'</span>'
	  );

	  return $sucursal;	
}

function formatSucursal (sucursal) {
  if (!sucursal.id) { return sucursal.text; }

  var arr = sucursal.text.split(',');

  var $sucursal = $(
    '<span>'+
		'<table>'+
			'<tbody>'+
				'<tr>'+
					'<th>Direccion:</th>'+
					'<td>'+arr["0"]+'</td>'+
				'</tr>'+

				'<tr>'+
					'<th>Ciudad:</th>'+
					'<td>'+arr["1"]+'</td>'+
				'</tr>'+
			'</tbody>'+
		'</table>'+
	'</span>');

  return $sucursal;
};

$('#formBuscar').submit(function (e) {
	e.preventDefault();
	var datos = $(this).serialize();

	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/enviosCompras') }}',
		type: 'GET',
		data: datos,
		dataType: 'json',
		beforeSend: function () {
			$('.box').append('<div class="overlay">'+
              					'<i class="fa fa-refresh fa-spin"></i>'+
            				'</div>');
			$('#modalBuscar').modal('hide');
		},
		success: function (data) {
			$('#tabla').html(data);
			$('.overlay').detach();

		},
		error: function (data) {
			$('.overlay').detach();
		}
	});
});

</script>