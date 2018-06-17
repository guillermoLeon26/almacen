<script type="text/javascript">
  
function editar(id) {
  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('admin/compras/proveedores') }}/' +id+'/edit',
    type: 'GET',
    dataType: 'json',
    beforeSend: function () {
      $('.box').append('<div class="overlay">'+
                        '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');
    },
    success: function (data) {
      $('#id').val(data.proveedor.id);
      $('#empresa').val(data.proveedor.empresa);
      $('#telefono').val(data.proveedor.telefono);
      $('#correo').val(data.proveedor.correo);
      $('#direccion').val(data.proveedor.direccion);
      $('#ciudad').val(data.proveedor.ciudad);
      $('#provincia').val(data.proveedor.provincia);
      $('#pais').val(data.proveedor.pais);

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

  var datos = $(this).serialize();
  var id = $('#id').val();

  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('admin/compras/proveedores') }}/' + id,
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

  console.log(datos);
  console.log($(this).attr('href'));

  datos['page'] = $('ul.pagination li.active span').html();
  datos['filtro'] = $('#buscar').val();

  return datos;
}

</script>