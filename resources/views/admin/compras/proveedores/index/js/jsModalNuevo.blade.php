<script type="text/javascript">
  
$('#formNuevo').submit(function (e) {
  e.preventDefault();
  
  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('admin/compras/proveedores') }}',
    type: 'POST',
    data: datosGuardar(),
    dataType: 'json',
    beforeSend: function () {
      $('.box').append('<div class="overlay">'+
                        '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');
      $('#modalNuevo').modal('hide');
    },
    success: function (data) {
      $('#tabla').html(data);
      $('.overlay').detach();
      toastr.success('Se ingresó el proveedor correctamente.');
      $('#formNuevo input').val('');
    },
    error: function (data) {
      $('.overlay').detach();

      mensaje('error', data, '#mensaje')
    }
  });
});

function datosGuardar() {
  var datos = {};

  $('#formNuevo input').each(function (i, input) {
    datos[input.name] = input.value;
  });

  datos['filtro'] = $('#buscar').val();
  datos['page'] = $('.pagination .active span').html();

  return datos;
}

</script>