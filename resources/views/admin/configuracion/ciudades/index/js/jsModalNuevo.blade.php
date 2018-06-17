<script>

$('#formIngresar').submit(function (e) {
	e.preventDefault();

	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('admin/config/ciudades') }}',
    type: 'POST',
    data: datosGuardar(),
    dataType: 'json',
    beforeSend: function () {
      $('#modalNuevo').modal('hide');
      $('.box').append('<div class="overlay">'+
                        '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');
    },
    success: function (data) {
      toastr.success('Se ingresó la ciudad correctamente.');

      $('#tabla').html(data);
      $('.overlay').detach();
    },
    error: function (data) {
      $('.overlay').detach();
      mensaje('error', data, '#mensaje');
    }
	});
});

function datosGuardar() {
  var datos = {};

  $('#formIngresar input').each(function (i, input) {
    datos[input.name] = input.value;
  });

  datos['page'] = $(this).attr('href').split('page=')[1];
  datos['filtro'] = $('#buscar').val();

  return datos;
}

</script>