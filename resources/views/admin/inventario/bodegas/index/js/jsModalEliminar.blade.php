<script>

function eliminar(id) {
  $('#eliminarId').val(id);
  $('#modalEliminar').modal('show');
}

$('#formEliminar').submit(function (e) {
  e.preventDefault();

  var id = $('#eliminarId').val();

  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('admin/inventario/bodegas') }}/' + id,
    type: 'DELETE',
    data: {bodega_id: id},
    dataType: 'json',
    beforeSend: function () {
      $('#modalEliminar').modal('hide');
      $('.box').append('<div class="overlay">'+
                          '<i class="fa fa-refresh fa-spin"></i>'+
                        '</div>');
    },
    success: function (data) {
      $('.overlay').detach();
      toastr.success('Se eliminó la bodega correctamente.');
        
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