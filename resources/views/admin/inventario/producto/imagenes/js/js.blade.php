<script type="text/javascript">

$('#imagenIngresar').fileinput({
	previewFileType: "image",
	allowedFileTypes: ["image"],
	minImageHeight: 520,
    maxFileSize: 1024, //1MB
    language: "es",
    browseLabel: "Escojer Imagen",
    browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
});

$('.select2').select2({
	dropdownParent: $('#modalIngresarImagen')
});

function ingresarImagenProducto() {
	$('#modalIngresarImagen').modal('show');
}

$('#formImgresarImagen').submit(function (e) {
	e.preventDefault();

	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto/imagen') }}',
		type: 'POST',
		data: new FormData($("#formImgresarImagen")[0]),
		dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: function () {
        	$('#formImgresarImagen .form-control').prop('disabled', true);
        	$('#imagenIngresar').fileinput('disable');
        	$('#btnIngresaImagen').prop('disabled', true);
        	$('#btnIngresaImagen').html('<i class="fa fa-refresh fa-spin"></i>');
        	$('#modalIngresarImagen .cerrar').removeAttr('data-dismiss');
        },
        success: function(data){
        	$('#formImgresarImagen .form-control').prop('disabled', false);
        	$('#imagenIngresar').fileinput('enable');
        	$('#imagenIngresar').fileinput('clear');
        	$('#btnIngresaImagen').prop('disabled', false);
        	$('#btnIngresaImagen').html('Ingresar');
        	$('#modalIngresarImagen .cerrar').attr('data-dismiss','modal');
        	$('#modalIngresarImagen').modal('hide');

	        actualizarTablaImagenes($('#idProducto').val());
	    },
	    error: function (data) {
	    	$('#formImgresarImagen .form-control').prop('disabled', false);
	    	$('#btnIngresaImagen').prop('disabled', false);
	    	$('#imagenIngresar').fileinput('enable');
	    	$('#btnIngresaImagen').html('Ingresar');
	    	$('#modalIngresarImagen .cerrar').attr('data-dismiss','modal');

	    	mensaje('error', data, '#mensajeModalColor');
	    }
	});
});

function actualizarTablaImagenes(idProducto) {
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto/imagen') }}/' + idProducto,
		type: 'GET',
		dataType: 'json',
		beforeSend: function () {
			$('.box').append('<div class="overlay">'+
              					'<i class="fa fa-refresh fa-spin"></i>'+
            				 '</div>');
		},
		success: function (data) {
			$('.overlay').detach();
			$('#tbodyTablaImagenes').html(data);
		},
		error: function () {
			$('.overlay').detach();
			mensaje2('error', 'Ocurrio un error con la conexión', '#mensaje');
		}
	});
}

function eliminarImagen(idImagen, idProducto) {
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto/imagen') }}/' + idImagen,
		type: 'DELETE',
		dataType: 'json',
		beforeSend: function () {
			$('.box').append('<div class="overlay">'+
              					'<i class="fa fa-refresh fa-spin"></i>'+
            				 '</div>');
		},
		success: function () {
			actualizarTablaImagenes(idProducto);
		},
		error: function (data) {
			$('.overlay').detach();
			mensaje2('error', 'Ocurrio un error con la conexión', '#mensaje');
		}
	});
}

function bajarNumeroOrden(idImagen) {
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto/imagen') }}/' + idImagen,
		type: 'PUT',
		data: {'mover':'abajo'},
		dataType: 'json',
		beforeSend: function () {
			$('.box').append('<div class="overlay">'+
              					'<i class="fa fa-refresh fa-spin"></i>'+
            				 '</div>');
		},
		success: function (data) {
			actualizarTablaImagenes($('#idProducto').val());
		},
		error: function (data) {
			$('.overlay').detach();
			mensaje2('error', 'Ocurrio un error con la conexión', '#mensaje');
		}
	});
}

function subirNumeroOrden(idImagen) {
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/producto/imagen') }}/' + idImagen,
		type: 'PUT',
		data: {'mover':'arriba'},
		dataType: 'json',
		beforeSend: function () {
			$('.box').append('<div class="overlay">'+
              					'<i class="fa fa-refresh fa-spin"></i>'+
            				 '</div>');
		},
		success: function (data) {
			actualizarTablaImagenes($('#idProducto').val());
		},
		error: function (data) {
			$('.overlay').detach();
			mensaje2('error', 'Ocurrio un error con la conexión', '#mensaje');
		}
	});
}

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