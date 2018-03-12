<script>
//--------------AGREAGAR DIMENSION A LA TABLA DIMENSIONES------------
var contDimension = 0;  

$('#btnAgregarDimensionTabla').click(function () {
  if (esValidoIngresarDimension()) {
    ingresarDimensionTabla();  
  } else {
    var msj = 'Ya se encuentra la dimensión en la tabla';

    mensaje2('error', msj, '#mensaje');
  }
  
});

function ingresarDimensionTabla() {
  var dimension = $('#txtDimension').val();
  var fila = '<tr id="filaDimension'+contDimension+'">'+
              '<td>'+
                '<button onclick="moverArribaFilaDimension('+contDimension+')" type="button" class="btn btn-warning">'+
                  '<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>'+
                '</button>'+

                '<button onclick="moverAbajoFilaDimension('+contDimension+')" type="button" class="btn btn-warning">'+
                  '<span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>'+
                '</button>'+
              '</td>'+
              '<td>'+
                '<input type="hidden" class="dimensiones" value="'+dimension+'">'+
                dimension+
              '</td>'+
              '<td>'+
                '<button onclick="eliminarFilaDimension('+contDimension+')" type="button" class="btn btn-danger">'+
                  '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>'+
                '</button>'+
              '</td>'+
            '</tr>';

  contDimension++;
  $('#trTablaDimension').append(fila);
  $('#txtDimension').val('');
}

function eliminarFilaDimension(index) {
  $('#filaDimension'+index).remove();
}

function esValidoIngresarDimension() {
  var dim = dimensiones();
  var dimension = $('#txtDimension').val();

  if (dimension.localeCompare('') == 0) { return false; }

  for (var i = 0; i < dim.length; i++) {
    if (dimension.localeCompare(dim[i]) == 0) { return false; }
  }

  return true;
}

function moverAbajoFilaDimension(index) {

  if ($('#filaDimension'+index).next().is('tr')) {
    var filaActual = '<tr id="filaDimension'+index+'">'+
                       $('#filaDimension'+index).html()+
                     '</tr>';

    var filaSiguiente = $('#filaDimension'+index).next();

    $('#filaDimension'+index).remove();
    filaSiguiente.after(filaActual);
  } 
}

function moverArribaFilaDimension(index) {

  if ($('#filaDimension'+index).prev().is('tr')) {
    var filaActual = '<tr id="filaDimension'+index+'">'+
              $('#filaDimension'+index).html()+
             '</tr>';
    var filaAnterior = $('#filaDimension'+index).prev();

    $('#filaDimension'+index).remove();
    filaAnterior.before(filaActual);
  } 
}

function dimensiones() {
  var dimensiones = [];

  $('.dimensiones').each(function (i, node) {
    dimensiones.push(node.value);
  });

  return dimensiones;
}
  
</script>