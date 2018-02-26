<script type="text/javascript">

function ver(envioId) {
	$.ajax({
		headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
		url: '{{ url('inventario/enviosCompras') }}/' + envioId + '/edit',
		type: 'GET',
		dataType: 'json',
		beforeSend: function () {
			$('.box').append('<div class="overlay">'+
              					'<i class="fa fa-refresh fa-spin"></i>'+
            				'</div>');
		},
		success: function (data) {
			$('#tablaVer').html(data);
			$('.overlay').detach();
			$('#modalVer').modal('show');
		},
		error: function (data) {
			$('.overlay').detach();
			mensaje2('error', 'Ocurrio un error con la conexión.', '#mensaje')
		}
	});
}

</script>