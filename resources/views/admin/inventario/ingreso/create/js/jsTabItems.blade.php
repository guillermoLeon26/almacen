<script type="text/javascript">
	
$('#selectProducto').select2({
	dropdownParent: $('#modalIngresarItems'),
	ajax: {
		id: function (e) {
			return producto.id;
		},
		url: '{{ url('inventario/producto') }}',
		type: 'GET',
		dataType: 'json',
		delay: 250,
		data: function (params) {
			return {
				filtro: params.term,
				todos: 'todos',
				page: params.page
			};
		},
		processResults: function (data, params) {
			params.page = params.page || 1;

			return {
				results: data.productos,
				pagination: {
		          more: (params.page * 20) < data.total_count
		        }
			};
		}
	},
	cache: true,
	templateResult: formatProducto,
	templateSelection: formatRepoProducto
});

function formatProducto (producto) {

  if (!producto.id) { return producto.text; }
  var $producto = $(
    	'<span>'+
			'<table>'+
				'<tbody>'+
					'<tr>'+
						'<td rowspan="3">'+
							'<img class="img-responsive img-thumbnail" src="'+producto.imagenes[0].imagen+'" height="100px" width="50px"/>'+
						'</td>'+
						'<td>'+
							producto.categoria +
						'</td>'+
					'</tr>'+

					'<tr>'+
						'<td>'+
							'<strong>Código: </strong> '+ producto.codigo +
						'</td>'+
					'</tr>'+

					'<tr>'+
						'<td>'+
							'<strong>Márca: </strong> '+ producto.marca +
						'</td>'+
					'</tr>'+
				'</thead>'+
			'</tbody>'+
		'</span>'
  );
  return $producto;
}

function formatRepoProducto(producto) {
	if (!producto.id) { return producto.text; }
	var $producto = $(
	    	'<span>'+
				producto.categoria+
				'<b>Codigo: </b>' + producto.codigo +
				'<b> Marca: </b>' + producto.marca +
			'</span>'
	);

	return $producto;
}

$('#selectDimension').select2({
	dropdownParent: $('#modalIngresarItems')
});

$('#selectColor').select2({
	dropdownParent: $('#modalIngresarItems')
});

//------------------------------------------------------------------------
var categoria;
var marca;
var imagen;

$('#selectProducto').on('select2:select', function (evt) {
  	var idProducto = $('#selectProducto').val();

  	$.ajax({
  		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto') }}/' + idProducto,
		type: 'GET',
		dataType: 'json',
		beforeSend: function () {
			$('#selectDimension').prop("disabled", true);
			$('#selectColor').prop("disabled", true);
		},
		success: function (data) {
			$('#selectDimension').prop("disabled", false);
			$('#selectColor').prop("disabled", false);
			categoria = data.producto.categoria;
			marca = data.producto.marca;
			imagen = data.producto.imagenes['0'].imagen;
			imprimirDimensiones(data.producto.dimensiones);
			imprimirColores(data.producto.colores);
		},
		error: function () {
			$('#selectDimension').prop("disabled", false);
			$('#selectColor').prop("disabled", false);

			mensaje2('error', 'Se produjo un error en la conexión.', '#mensaje');
		}
  	});
});

function imprimirDimensiones(dimensiones) {
	var opciones = '';

	$.each(dimensiones, function (i, dimension) {
		opciones += '<option value="'+dimension.id+'">'+dimension.dimension+'</option>';
	});

	$('#selectDimension').html(opciones);
}

function imprimirColores(colores) {
	var opciones = '';

	$.each(colores, function (i, color) {
		opciones += '<option value="'+color+'">'+color+'</option>';
	});

	$('#selectColor').html(opciones);
}
//-----------------------------------------------------------------------------------
var contItems = 0;
var idProducto = [];
var idStock = [];
var color = [];
var cantProducto = [];

$('#btnGuardarItems').click(function () {

	if (esValidoIngresarItem()) {
		idProducto[contItems] = $('#selectProducto').val();
		idStock[contItems] = $('#selectDimension').val();
		var dimension = $("#selectDimension option:selected").html();
		color[contItems] = $('#selectColor').val();
		cantProducto[contItems] = $('#cantProducto').val();
		
		var fila = '<tr id="filaItem'+contItems+'">'+
						'<td>'+
							'<button class="btn btn-danger" onclick="eliminarItem('+contItems+')">'+
								'<i class="glyphicon glyphicon-trash"></i>'+
							'</button>'+
						'</td>'+
						'<td><img class="img-responsive img-thumbnail" width="50px" src="'+imagen+'"></td>'+
						'<td>'+categoria+'</td>'+
						'<td>'+marca+'</td>'+
						'<td>'+dimension+'</td>'+
						'<td>'+color[contItems]+'</td>'+
						'<td>'+cantProducto[contItems]+'</td>'+
					'</tr>';
		
		$('#tablaItems').append(fila);
		$('#modalIngresarItems').modal('hide');
		contItems++;
	}
});


function esValidoIngresarItem() {
	var stockId = $('#selectDimension').val();
	var col = $('#selectColor').val();
	var cantidad = $('#cantProducto').val();

	if (cantidad == 0) {
		return false;
	}

	if ($.inArray(stockId, idStock) >= 0 && $.inArray(col, color) >= 0) {
		return false;
	}

	return true;
}

function eliminarItem(index) {
	delete idProducto[index];
	delete idStock[index];
	delete color[index];
	delete cantProducto[index];
	
	$('#filaItem'+index).remove();
}

</script>