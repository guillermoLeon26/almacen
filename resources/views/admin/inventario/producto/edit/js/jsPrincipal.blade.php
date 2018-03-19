<script>

function guardar() {
  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('admin/inventario/productos') }}/{{$producto->id}}',
    type: 'POST',
    data: {
      _method: 'PUT',
      categorias: categorias(),
      producto: producto(),
      colores: colores(),
      dimensiones: dimensiones()
    },
    dataType: 'json',
    beforeSend: function () {
      $('#btnGuardar').prop('disabled', true);
      $('.box').append('<div class="overlay">'+
                        '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');
    },
    success: function (data) {
      $('.overlay').detach();
      $('#btnGuardar').prop('disabled', false);
      toastr.success('Se ingresó el producto correctamente.');
      window.location.href = "{{ url('admin/inventario/productos') }}";
    },
    error: function (data) {
      $('.overlay').detach();
      $('#btnGuardar').prop('disabled', false);
      mensaje('error', data, '#mensaje');
    }
  });
}

</script>