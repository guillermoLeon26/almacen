<script type="text/javascript">

$('#selSucursales').select2({
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

</script>