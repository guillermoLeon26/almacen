<script type="text/javascript">
	
$('#formIngresar').submit(function (e) {
	e.preventDefault();

	var datos = $(this).serialize();

	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('admin/inventario/bodegas') }}',
    type: 'POST',
    data: datos,
    dataType: 'json',
    beforeSend: function () {
      $('#modalNuevo').modal('hide');
      $('.box').append('<div class="overlay">'+
                        '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');
    },
    success: function () {
    	$('.overlay').detach();
      toastr.success('Se ingresó la ciudad correctamente.');

      var page = $('.pagination .active span').html();
      var filtro = $('#buscar').val();

      //generarTabla(page, filtro);
    },
    error: function (data) {
      $('.overlay').detach();
      mensaje2('error', 'Ocurrio un error al guardar la ciudad', '#mensaje');
    }
	});
});

</script>
