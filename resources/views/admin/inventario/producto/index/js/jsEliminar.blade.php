<script>

function eliminar(id) {
  $('#eliminarId').val(id);
  $('#modalEliminarProducto').modal('show');
}

$('#formEliminar').submit(function (e) {
  e.preventDefault();
  var id = $('#eliminarId').val();

  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('admin/inventario/productos') }}/' + id,
    type: 'DELETE',
    data: {
      producto_id: id
    },
    dataType: 'json',
    beforeSend: function () {
      $('#modalEliminarProducto').modal('hide');
      $('.box').append('<div class="overlay">'+
                        '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');
    },
    success: function () {
      toastr.success('Se eliminó el color correctamente.');

      var filtro = $('#buscar').val();
      var page = $(this).attr('href').split('page=')[1];

      $('.overlay').detach();
      generarTabla(1, filtro);
    },
    error: function (data) {
      $('.overlay').detach();
      mensaje('error', data, '#mensaje');
    }
  });
});
  
</script>