<script>
//----------------------------------INGRESAR COLORES-----------------------------
$('#formIngresoColor').submit(function (e) {
  e.preventDefault();
  var datos = $(this).serialize();
  
  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('admin/inventario/productos/cbBoxColor') }}',
    type: 'POST',
    data: datos,
    dataType: 'json',
    beforeSend: function () {
      $('#modalIngresarColor').modal('hide');
      $('#btnGuardar').prop('disabled', true);
      $('.box').append('<div class="overlay">'+
                        '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');
    },
    success: function (data) {
      $('#selColor').html(data);
      $('#comboBoxColor').select2();
      $('.overlay').detach();
      $('#btnGuardar').prop('disabled', false);
      toastr.success('Se ingresó el color correctamente.');
    },
    error: function (data) {
      $('.overlay').detach();
      $('#btnGuardar').prop('disabled', false);
      mensaje('error', data, '#mensaje');
    }
  });
});
//-----------------------------------------------------------------------------------
//-------------------------AGREAGAR COLOR A LA TABLA COLORES-----------------
$('#btnAgregarColorTabla').click(function () {
  if (esValidoIngresarColor()) {
    ingresarColorTabla();  
  } else {
    var msj = 'Ya se encuentra el color en la tabla';

    mensaje2('error', msj, '#mensaje');
  }
  
});

function ingresarColorTabla() {
  var idColor = $('#comboBoxColor').val();
  var color = $("#comboBoxColor option:selected").html();
  var fila = '<tr id="fila'+idColor+'">'+
              '<td>'+
                '<input type="hidden" class="colores" value="'+idColor+'">'+
                color+
              '</td>'+
              '<td>'+
                '<button onclick="eliminarFilaColor('+idColor+')" class="btn btn-danger">'+
                  '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>'+
                '</button>'+
              '</td>'+
            '</tr>';
  
  $('#trTablaColores').append(fila);
}

function eliminarFilaColor(index) {
  $('#fila'+index).remove();
}

function esValidoIngresarColor() {
  var clrs = colores();
  var idColor = $('#comboBoxColor').val();

  for (var i = 0; i < clrs.length; i++) {
    if (clrs[i] == idColor) { return false; }
  }
  return true;
}

function colores() {
  var colores = [];
  
  $('.colores').each(function (i, node) {
    colores.push(node.value);
  });

  return colores;
}
//----------------------------------------------------------------

</script>