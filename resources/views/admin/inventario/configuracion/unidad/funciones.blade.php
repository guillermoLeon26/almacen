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
			url: '{{ url('admin/inventario/configuracion/unidad') }}',
			type: 'GET',
			data: {'page':page, 'filtro':filtro},
			dataType: 'json',
			beforeSend: function () {
		 		$('#registrarIngreso').prop('disabled', true);
        $('.box').append('<div class="overlay">'+
					      						'<i class="fa fa-refresh fa-spin"></i>'+
					    					 '</div>');
    	},
			success: function (data) {
		 		$('#registrarIngreso').prop('disabled', false);
				$('#marcas').html(data);
				$('.overlay').detach();
			}
		});
	}
//------------------------------------------------------------
//------------------------GUARDAR----------------------------- 
	$('#guardar').submit(function (e) {
		e.preventDefault();
		var datos = $(this).serialize();
		var page = $('.pagination .active span').html();
		
		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
			url: '{{ url('admin/inventario/configuracion/unidad') }}',
		 	type: 'POST',
		 	data: datos,
		 	dataType: 'json',
		 	beforeSend: function () {
		 		$('#ingresarModal').modal('hide');
		 		$('#registrarIngreso').prop('disabled', true);
		 		$('#registrarIngreso').html('<i class="fa fa-refresh fa-spin"></i>');
		 		$('.box').append('<div class="overlay">'+
					      						'<i class="fa fa-refresh fa-spin"></i>'+
					    					 '</div>');
		 	},
		 	success: function (data) {
		 		$('#guardar .form-control').val('');
		 		$('#registrarIngreso').prop('disabled', false);
		 		$('#registrarIngreso').html('<i class="glyphicon glyphicon-plus"></i>Nuevo');
		 		generarTabla(page);
		 		mensaje('ok', data, '#mensaje');
		 	},
		 	error: function (data) {
		 		$('#registrarIngreso').prop('disabled', false);
		 		$('#registrarIngreso').html('<i class="glyphicon glyphicon-plus"></i>Nuevo');
		 		$('.overlay').detach();
		 		mensaje('error', data, '#mensaje');
		 	}
		});
	});
//----------------------------------------------------------
//----------------MOSTRAR MODAL ACTUALIZAR------------------
	function mostrar(id) {
		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		 	url: '{{url('admin/inventario/configuracion/unidad')}}/'+id+'/edit',
		 	type: 'GET',
		 	dataType: 'json',
		 	beforeSend: function () {
		 		$('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					   '</div>');
		 	},
		 	success: function (data) {
		 		$('.overlay').detach();
		 		$('#mostrarUnidad').modal('show');
		 		$('#unidad').val(data.unidad);
		 		$('#simbolo').val(data.simbolo);
		 		$('#id').val(data.id);
		 	}
		});
	}
//----------------------------------------------------------
//---------------MOSTRAR MODAL ELIMINAR---------------------
	function eliminar(id) {
		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		 	url: '{{url('admin/inventario/configuracion/unidad')}}/'+id+'/edit',
		 	type: 'GET',
		 	dataType: 'json',
		 	beforeSend: function () {
		 		$('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					 	 '</div>');
		 	},
		 	success: function (data) {
		 		$('.overlay').detach();
		 		$('#eliminarUnidad').modal('show');
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
		var id = $('#id').val();

		$.ajax({
			headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
			url: '{{url('admin/inventario/configuracion/unidad')}}/' + id,
			type: 'POST',
			data: datos,
			dataType: 'json',
			beforeSend: function () {
				$('#mostrarUnidad').modal('hide');
				$('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					 	 '</div>');
			},
			success: function (data) {
				$('.overlay').detach();
		 		generarTabla(page);
		 		mensaje('ok', data, '#mensaje');
			},
			error: function (data) {
				$('.overlay').detach();
				mensaje('error', data, '#mensaje');
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
			url: '{{url('admin/inventario/configuracion/unidad')}}/' + id,
			type: 'DELETE',
			dataType: 'json',
			beforeSend: function () {
				$('#eliminarUnidad').modal('hide');
		 		$('.box').append('<div class="overlay">'+
              						'<i class="fa fa-refresh fa-spin"></i>'+
            					 '</div>');
			},
			success: function (data) {
		 		$('.overlay').detach();
				mensaje('ok', data, '#mensaje');
				generarTabla(page);
			},
			error: function (data) {
		 		$('.overlay').detach();
				mensaje('error', data, '#mensaje');
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
			var arrayMensajes = data.responseJSON.errors;
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
</script>