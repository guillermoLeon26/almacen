<script>

var contPagos = 0;

$('#btnGuardarPago').click(function () {
  var fechaPago = $('#fechaPago').val();
  var tipoPago = $('#tipoPago').val();
  var numeroDocumento = $('#numeroDocumento').val();
  var montoPago = $('#montoPago').val();

  var fila = '<tr id="filaPago'+contPagos+'">'+
                '<td>'+
                  '<button class="btn btn-danger" onclick="eliminarPago('+contPagos+')">'+
                    '<i class="glyphicon glyphicon-trash"></i>'+
                  '</button>'+
                '</td>'+
                '<td>'+fechaPago+'</td>'+
                '<td>'+tipoPago+'</td>'+
                '<td>'+numeroDocumento+'</td>'+
                '<td>'+montoPago+'</td>'+
              '</tr>';
  
  $('#tablaPagos').append(fila);
  $('#modalIngresarPagos').modal('hide');
});

</script>
