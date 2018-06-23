<script type="text/javascript">

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
		url: '{{ url('admin/compras/proveedores/tabla') }}',
		type: 'GET',
		data: {'page':page, 'filtro':filtro},
		dataType: 'json',
		beforeSend: function () {
      $('.box').append('<div class="overlay">'+
				    						 '<i class="fa fa-refresh fa-spin"></i>'+
				  					 	 '</div>');
  	},
		success: function (data) {
			$('#tabla').html(data);
			$('.overlay').detach();
		}
	});
}

//---------------------BUSCAR-------------------------------
$('#buscar').on('keyup', function () {
	var filtro = $('#buscar').val();

	generarTabla(1, filtro);
});

</script>