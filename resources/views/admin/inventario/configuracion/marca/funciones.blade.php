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
			url: '{{ url('admin/inventario/configuracion/marca') }}',
			type: 'GET',
			data: {'page':page, 'filtro':filtro},
			dataType: 'json',
			beforeSend: function () {
                $('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					 '</div>');
            },
			success: function (data) {
				$('#marcas').html(data);
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
			url: '{{ url('admin/inventario/configuracion/marca') }}',
		 	type: 'POST',
		 	data: datos,
		 	dataType: 'json',
		 	beforeSend: function () {
		 		$('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					 '</div>');
		 		$('#btnNuevo').html('<i class="fa fa-refresh fa-spin"></i>');
		 		$('#modalNuevo').modal('hide');
		 	},
		 	success: function (data) {
		 		$('#marca').val('');
		 		$('#btnNuevo').html('<i class="glyphicon glyphicon-plus"></i>Nuevo');
		 		$('.overlay').detach();
		 		generarTabla(page);
		 		mensaje('ok', data);
		 	},
		 	error: function (data) {
		 		$('#btnNuevo').html('<i class="glyphicon glyphicon-plus"></i>Nuevo');
		 		$('.overlay').detach();
		 		mensaje('error', data);
		 	}
		});
	});
//----------------------------------------------------------
//----------------MOSTRAR MODAL ACTUALIZAR------------------
	function mostrar(id) {
		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		 	url: '{{url('admin/inventario/configuracion/marca')}}/'+id+'/edit',
		 	type: 'GET',
		 	dataType: 'json',
		 	beforeSend: function () {
		 		$('#btnNuevo').html('<i class="fa fa-refresh fa-spin"></i>');
		 		$('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					 '</div>');
		 	},
		 	success: function (data) {
		 		$('#btnNuevo').html('<i class="glyphicon glyphicon-plus"></i>Nuevo');
		 		$('.overlay').detach();
		 		$('#mostarMarca').modal('show');
		 		$('#actualizarMarca').val(data.marca);
		 		$('#actualizarId').val(data.id);
		 	}
		});
	}
//----------------------------------------------------------
//---------------MOSTRAR MODAL ELIMINAR---------------------
	function eliminar(id) {
		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		 	url: '{{url('admin/inventario/configuracion/marca')}}/'+id+'/edit',
		 	type: 'GET',
		 	dataType: 'json',
		 	beforeSend: function () {
		 		$('#btnNuevo').html('<i class="fa fa-refresh fa-spin"></i>');
		 		$('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					 '</div>');
		 	},
		 	success: function (data) {
		 		$('#btnNuevo').html('<i class="glyphicon glyphicon-plus"></i>Nuevo');
		 		$('.overlay').detach();
		 		$('#eliminarMarca').modal('show');
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
			url: '{{url('admin/inventario/configuracion/marca')}}/' + id,
			type: 'PUT',
			data: datos,
			dataType: 'json',
			beforeSend: function () {
				$('#mostarMarca').modal('hide');
				$('#btnNuevo').html('<i class="fa fa-refresh fa-spin"></i>');
		 		$('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					 '</div>');
			},
			success: function (data) {
		 		$('.overlay').detach();
		 		$('#btnNuevo').html('<i class="glyphicon glyphicon-plus"></i>Nuevo');
				mensaje('ok',data);
				generarTabla(page);
			},
			error: function (data) {
		 		$('.overlay').detach();
		 		$('#btnNuevo').html('<i class="glyphicon glyphicon-plus"></i>Nuevo');
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
			url: '{{url('admin/inventario/configuracion/marca')}}/' + id,
			type: 'DELETE',
			dataType: 'json',
			beforeSend: function () {
				$('#eliminarMarca').modal('hide');
				$('#btnNuevo').html('<i class="fa fa-refresh fa-spin"></i>');
		 		$('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					 '</div>');
			},
			success: function (data) {
		 		$('.overlay').detach();
		 		$('#btnNuevo').html('<i class="glyphicon glyphicon-plus"></i>Nuevo');
				mensaje('ok', data);
				generarTabla(page);
			},
			error: function (data) {
		 		$('.overlay').detach();
		 		$('#btnNuevo').html('<i class="glyphicon glyphicon-plus"></i>Nuevo');
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