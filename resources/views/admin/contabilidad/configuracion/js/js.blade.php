<script>
  $('#formConfiguracion').submit(function (e) {
    e.preventDefault();

    var datos = $(this).serialize();

    $.ajax({
      headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
      url: '{{ url('admin/cont/config/1') }}',
      type: 'POST',
      data: datos,
      dataType: 'json',
      beforeSend: function() {
        $('.box').append('<div class="overlay">'+
                          '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');
      },
      success: function() {
        $('.overlay').detach();
        toastr.success('Se cambio la configuración correctamente.');
      },
      error: function(data) {
        $('.overlay').detach();
        mensaje('error', data, '#mensaje');
      }
    });
  });
</script>