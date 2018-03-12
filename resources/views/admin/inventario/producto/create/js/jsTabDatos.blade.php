<script>
//--------------------------CATEGORIA-------------------------------------
$('#formIngresoCategoria').submit(function (e) {
  e.preventDefault();
  var datos = $(this).serialize();
  
  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('admin/inventario/productos/cbBoxCategoria') }}',
    type: 'POST',
    data: datos,
    dataType: 'json',
    beforeSend: function () {
      $('#modalIngresarCategoria').modal('hide');
      $('#btnGuardar').prop('disabled', true);
      $('.box').append('<div class="overlay">'+
                        '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');
    },
    success: function (data) {
      $('#selCategoria').html(data);
      $('#categorias').select2();
      $('.overlay').detach();
      $('#btnGuardar').prop('disabled', false);
      toastr.success('Se ingresó la categoria correctamente.');
    },
    error: function (data) {
      $('.overlay').detach();
      $('#btnGuardar').prop('disabled', false);
      mensaje('error', data, '#mensaje');
    }
  });
});
//-----------------------------------------------------------------------------
//------------------------------MARCA-----------------------------------
$('#formIngresoMarca').submit(function (e) {
  e.preventDefault();
  var datos = $(this).serialize();
  
  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('admin/inventario/productos/cbBoxMarca') }}',
    type: 'POST',
    data: datos,
    dataType: 'json',
    beforeSend: function () {
      $('#modalIngresarMarca').modal('hide');
      $('#btnGuardar').prop('disabled', true);
      $('.box').append('<div class="overlay">'+
                        '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');
    },
    success: function (data) {
      $('#selMarca').html(data);
      $('#marca').select2();
      $('.overlay').detach();
      $('#btnGuardar').prop('disabled', false);
      toastr.success('Se ingresó la marca correctamente.');
    },
    error: function (data) {
      $('.overlay').detach();
      $('#btnGuardar').prop('disabled', false);
      mensaje('error', data, '#mensaje');
    }
  });
});
//-------------------------------------------------------------------------------------
//-------------------------------------UNIDAD------------------------------------------
$('#formIngresoUnidad').submit(function (e) {
  e.preventDefault();
  var datos = $(this).serialize();
  
  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('admin/inventario/productos/cbBoxUnidad') }}',
    type: 'POST',
    data: datos,
    dataType: 'json',
    beforeSend: function () {
      $('#modalIngresarUnidad').modal('hide');
      $('#btnGuardar').prop('disabled', true);
      $('.box').append('<div class="overlay">'+
                        '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');
    },
    success: function (data) {
      $('#selUnidad').html(data);
      $('#unidad').select2();
      $('.overlay').detach();
      $('#btnGuardar').prop('disabled', false);
      toastr.success('Se ingresó la unidad correctamente.');
    },
    error: function (data) {
      $('.overlay').detach();
      $('#btnGuardar').prop('disabled', false);
      mensaje('error', data, '#mensaje');
    }
  });
});
//-------------------------------------------------------------------------------------
//-------------------------------------DATOS-------------------------------------------

function categorias() {
  return $('#categorias').val();
}

function producto() {
  var producto = {};
  
  producto['codigo'] = $('#codigo').val();
  producto['marca'] = $('#marca').val();
  producto['unidades'] = $('#unidad option:selected').html();
  producto['simbolo'] = $('#unidad').val();
  producto['descripcion'] = $('#descripcion').val();

  return producto;
}
</script>