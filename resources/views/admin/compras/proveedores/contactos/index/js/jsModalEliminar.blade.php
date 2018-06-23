<script type="text/javascript">
  
function eliminar(id) {
  $('#eliminarId').val(id);
  $('#modalEliminar').modal('show');
}

$('#formEliminar').submit(function (e) {
  e.preventDefault();
  
  var id = $('#eliminarId').val();

  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{url('admin/compras/contactos')}}/' + id,
    type: 'DELETE',
    data: {
      contacto_id: id,
      page: $('#buscar').val(),
      filtro: $('.pagination .active span').html()
    },
    dataType: 'json',
    beforeSend: function () {
      $('.box').append('<div class="overlay">'+
                          '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');
      $('#modalEliminar').modal('hide');
    },
    success: function (data) {
      $('#tabla').html(data);
      $('.overlay').detach();
      toastr.success('Se eliminó la ciudad correctamente.');
    },
    error: function (data) {
      $('.overlay').detach();
      mensaje('error', data);
    }
  });
});

</script>