<script type="text/javascript">
  
function editar(id) {
  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('admin/compras/contactos') }}/' + id +'/edit',
    type: 'GET',
    dataType: 'json',
    beforeSend: function () {
      $('.box').append('<div class="overlay">'+
                        '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');
    },
    success: function (data) {
      $('#id').val(data.contacto.id);
      $('#proveedor_id').val(data.contacto.proveedor_id);
      $('#nombre').val(data.contacto.nombre);
      $('#telefono').val(data.contacto.telefono);
      $('#celular').val(data.contacto.celular);
      $('#correo').val(data.contacto.correo);
      $('#cargo').val(data.contacto.cargo);

      $('#modalEditar').modal('show');
      $('.overlay').detach();
    },
    error: function () {
      $('.overlay').detach();
      mensaje2('error', 'Ocurrio un error con la conexión.', '#mensaje')
    }
  });
}

$('#formEditar').submit(function (e) {
  e.preventDefault();
  
  var id = $('#id').val();

  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('admin/compras/contactos') }}/' + id,
    type: 'PUT',
    data: datosActualizar(),
    dataType: 'json',
    beforeSend: function () {
      $('#modalEditar').modal('hide');
      $('.box').append('<div class="overlay">'+
                        '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');      
    },
    success: function (data) {
      toastr.success('Se actualizó la ciudad correctamente.');

      $('#tabla').html(data);
      $('.overlay').detach();
    },
    error: function (data) {
      $('.overlay').detach();
      mensaje('error', data, '#mensaje')
    }
  });
});

function datosActualizar() {
  var datos = {};

  $('#formEditar input').each(function (i, input) {
    datos[input.name] = input.value;
  });

  datos['page'] = $('ul.pagination li.active span').html();
  datos['filtro'] = $('#buscar').val();

  return datos;
}

</script>