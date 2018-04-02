<script>
//----------------------GENERAR TABLA-------------------------
	$(document).on('click', '.pagination a', function (e) {
		e.preventDefault();
		var page = $(this).attr('href').split('page=')[1];
		var filtro = $('#buscar').val();
		
		generarTabla(page, filtro);
	});

	function generarTabla(page, filtro) {
		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
			url: '{{ url('admin/inventario/configuracion/Color') }}',
			type: 'GET',
			data: {'page':page, 'filtro':filtro},
			dataType: 'json',
			beforeSend: function () {
                $('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					 '</div>');
            },
			success: function (data) {
				$('#colores').html(data);
				$('.overlay').detach();
			}
		});
	}
//------------------------------------------------------------
//------------------------GUARDAR----------------------------- 
	$('#registrar').submit(function (e) {
		e.preventDefault();
		var datos = $(this).serialize();
		var page = $('.pagination .active span').html();
		
		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
			url: '{{ url('admin/inventario/configuracion/Color') }}',
		 	type: 'POST',
		 	data: datos,
		 	dataType: 'json',
		 	beforeSend: function () {
				$('#modalNuevo').modal('hide')
                $('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					 '</div>');

            },
		 	success: function (data) {
		 		$('.overlay').detach();
		 		generarTabla(page);
		 		mensaje('ok', data);
		 	},
		 	error: function (data) {
		 		console.log(data.responseJSON);
		 		mensaje('error', data);
		 		$('.overlay').detach();
		 	}
		});
	});
//----------------------------------------------------------
//----------------MOSTRAR MODAL ACTUALIZAR------------------
	function mostrar(id) {
		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		 	url: '{{url('admin/inventario/configuracion/Color')}}/'+id+'/edit',
		 	type: 'GET',
		 	dataType: 'json',
		 	beforeSend: function () {
                $('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					 '</div>');
            },
		 	success: function (data) {
		 		$('#mostarColor').modal('show');
		 		$('.overlay').detach();
		 		$('#actualizarColor').val(data.color);
		 		$('#actualizarId').val(data.id);
		 	}
		});
	}
//----------------------------------------------------------
//---------------MOSTRAR MODAL ELIMINAR---------------------
	function eliminar(id) {
		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		 	url: '{{url('admin/inventario/configuracion/Color')}}/'+id+'/edit',
		 	type: 'GET',
		 	dataType: 'json',
		 	beforeSend: function () {
                $('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					 '</div>');
            },
		 	success: function (data) {
		 		$('#eliminarColor').modal('show');
		 		$('.overlay').detach();
		 		$('#eliminarId').val(data.id);
		 	}
		});	
	}
//----------------------------------------------------------
//-----------------ACTUALIZAR DATOS-------------------------
	$('#actualizar').submit(function (e) {
		e.preventDefault();
		var datos = $(this).serialize();
		var page = $('.pagination .active span').html();
		var id = $('#actualizarId').val();

		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
			url: '{{url('admin/inventario/configuracion/Color')}}/' + id,
			type: 'POST',
			data: datos,
			dataType: 'json',
			beforeSend: function () {
				$('#mostarColor').modal('hide');
                $('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					 '</div>');
            },
			success: function (data) {
		 		$('.overlay').detach();
				mensaje('ok',data);
				generarTabla(page);
			},
			error: function (data) {
		 		$('.overlay').detach();
				mensaje('error', data);
			}
		});
	});
//---------------------------------------------------------
//-------------------ELIMINAR DATOS------------------------
	$('#eliminar').submit(function (e) {
		e.preventDefault();
		var page = $('.pagination .active span').html();
		var id = $('#eliminarId').val();

		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
			url: '{{url('admin/inventario/configuracion/Color')}}/' + id,
			type: 'DELETE',
			data: {color_id: id},
			dataType: 'json',
			beforeSend: function () {
				$('#eliminarColor').modal('hide');
                $('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					 '</div>');
            },
			success: function (data) {
		 		$('.overlay').detach();
				mensaje('ok', data);
				generarTabla(page);
			},
			error: function (data) {
		 		$('.overlay').detach();
				mensaje('error', data);
			}
		});
	})
//----------------------------------------------------------
//---------------------BUSCAR-------------------------------
	$('#buscar').on('keyup', function () {
		var filtro = $('#buscar').val();

		generarTabla(1, filtro);
	});
//----------------------------------------------------------
//---------------------MENSAJE------------------------------
	function mensaje(tipo, data) {
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
			var arrayMensajes = data.responseJSON.errors;
			mensajes = '<ul>';
			$.each(arrayMensajes, function (i, reg) {
				mensajes +=	'<li>'+reg+'</li>';
			});
			mensajes += '</ul>';
		}

		var html = 	'<div class="col-xs-12 col-lg-9 col-md-9 col-sm-9">'+
		            	'<div class="'+tipo+'">'+
		               		'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
		               		'<h4><i class="'+icono+'"></i> '+titulo+'</h4>'+
		               		mensajes+
		            	'</div>'+
		          	'</div>';
		        	
		$('#mensaje').html(html); 
	}
</script>