<script type="text/javascript">

function eliminar(idCiudad) {
	$('#eliminarId').val(idCiudad);
	$('#modalEliminar').modal('show');
}

$('#formEliminar').submit(function (e) {
	e.preventDefault();
	
	var id = $('#eliminarId').val();

	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{url('admin/config/ciudades')}}/' + id,
		type: 'DELETE',
		data: {ciudad_id: id},
		dataType: 'json',
		beforeSend: function () {
			$('#eliminarColor').modal('hide');
      $('.box').append('<div class="overlay">'+
					    						'<i class="fa fa-refresh fa-spin"></i>'+
					  					 '</div>');
      $('#modalEliminar').modal('hide');
    },
		success: function (data) {
	 		$('.overlay').detach();
			toastr.success('Se eliminó la ciudad correctamente.');
			
			var page = $('.pagination .active span').html();
			var filtro = $('#buscar').val();

      generarTabla(page, filtro);
		},
		error: function (data) {
	 		$('.overlay').detach();
			mensaje('error', data);
		}
	});
});

</script>