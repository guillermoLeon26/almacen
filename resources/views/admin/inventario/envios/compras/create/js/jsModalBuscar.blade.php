<script type="text/javascript">

$('.fecha').datepicker({
    autoclose: true,
    language: 'es',
    todayHighlight: true
});

$('#formBuscar').submit(function (e) {
	e.preventDefault();
	var datos = $(this).serialize() + '&envio=envio';

	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('contabilidad/compras') }}',
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