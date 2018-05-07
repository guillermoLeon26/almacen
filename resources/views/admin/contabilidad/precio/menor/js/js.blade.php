<script type="text/javascript">

//-------------------------------------SELECCION DE PRODUCTO------------------------
$('#selectProductos').select2({
  
  ajax: {
    id: function (e) {
      return producto.id;
    },
    url: '{{ url('inventario/producto') }}',
    type: 'GET',
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
        filtro: params.term,
        todos: 'todos',
        page: params.page
      };
    },
    processResults: function (data, params) {
      params.page = params.page || 1;

      return {
        results: data.productos,
        pagination: {
              more: (params.page * 20) < data.total_count
            }
      };
    }
  },
  cache: true,
  templateResult: formatProducto,
  templateSelection: formatRepoProducto
});

function formatProducto (producto) {
  if (!producto.id) { return producto.text; }
    var $producto = $(
      '<span>'+
        '<table>'+
          '<tbody>'+
            '<tr>'+
              '<td rowspan="3">'+
                '<img class="img-responsive img-thumbnail" src="'+producto.imagenes[0].imagen+'" height="100px" width="50px"/>'+
              '</td>'+
              '<td>'+
                producto.categoria +
              '</td>'+
            '</tr>'+

            '<tr>'+
              '<td>'+
                '<strong>Código: </strong> '+ producto.codigo +
              '</td>'+
            '</tr>'+

            '<tr>'+
              '<td>'+
                '<strong>Márca: </strong> '+ producto.marca +
              '</td>'+
            '</tr>'+
          '</thead>'+
        '</tbody>'+
      '</span>'
    );
  return $producto;
}

function formatRepoProducto(producto) {
  if (!producto.id) { return producto.text; }
  var $producto = $(
    '<span>'+
      producto.categoria+
      '<b>Codigo: </b>' + producto.codigo +
      '<b> Marca: </b>' + producto.marca +
    '</span>'
  );

  return $producto;
}

$('#selectProductos').on('select2:open', function (evt) {
  $('.select2-results__options').css('max-height', '400px');
});

$('#selectProductos').on('select2:select', function (evt) {
    buscarDimensiones();
});

function buscarDimensiones() {
  var idProducto = $('#selectProductos').val();

  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('inventario/producto') }}/' + idProducto,
    type: 'GET',
    dataType: 'json',
    beforeSend: function () {
      $('.box').append('<div class="overlay">'+
                        '<i class="fa fa-refresh fa-spin"></i>'+
                    '</div>');
    },
    success: function (data) {
      $('.overlay').detach();
      imprimirTablaPrecios(data.producto.dimensiones);
    },
    error: function (data) {
      $('.overlay').detach();
      mensaje2('error', 'Ocurrio un error en la conexión.', '#mensaje');
    }
  });
}

function imprimirTablaPrecios(dimensiones) {
  var fila = '';

  $.each(dimensiones, function (i, dimension) {
    var costo = parseFloat(dimension.costo);
    var ganancia = parseFloat(dimension.ganancia_por_menor);
    var descuento = parseFloat(dimension.descuento_por_menor);
    var subtotal = costo + ganancia;
    var iva = subtotal * parseFloat('{{ $config->IVA }}') / 100;
    var precio = subtotal + iva + descuento;

    fila += '<tr>'+
              '<td><input class="idDimensiones" type="checkbox" value="'+dimension.id+'"></td>'+
              '<td>'+dimension.dimension+'</td>'+
              '<td>'+dimension.costo+'</td>'+
              '<td>'+dimension.pocentaje_ganancia_por_menor+'</td>'+
              '<td>'+dimension.ganancia_por_menor+'</td>'+
              '<td>'+dimension.porcentaje_descuento_por_menor+'</td>'+
              '<td>'+dimension.descuento_por_menor+'</td>'+
              '<td>'+ iva.toFixed(2) +'</td>'+
              '<td>'+ precio.toFixed(2) +'</td>'+
            '</tr>';    
  });

  $('#tbodyTablaImagenes').html(fila);
}


//------------------------------------------------------------------
function getArrayIdDimensiones() {
  var arr = new Array();

  $('.idDimensiones:checked').each(function () {
    arr.push($(this).val());
  });

  return arr;
}

$('#checkSeleccionarTodo').click(function () {
  if ($(this).is(':checked')) {
    $(".idDimensiones").prop("checked", true);
  } else {
    $(".idDimensiones").prop("checked", false);
  }
});

//---------------------MENSAJE------------------------------
function mensaje(tipo, data, lugar) {
  var tipoAlerta, icono, titulo, html, mensajes='';

  if (tipo == 'ok') {
    tipo = 'alert alert-success alert-dismissible';
    icono = 'icon fa fa-check';
    titulo = 'Exito!';
    mensajes = data.mensaje;

  }else if (tipo == 'error') {
    tipo = 'alert alert-danger alert-dismissible';
    icono = 'icon fa fa-ban';
    titulo = 'Alerta!';
    var arrayMensajes = data.responseJSON;
    mensajes = '<ul>';
    $.each(arrayMensajes, function (i, reg) {
      mensajes += '<li>'+reg+'</li>';
    });
    mensajes += '</ul>';
  }

  var html =  '<div class="'+tipo+'">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                '<h4><i class="'+icono+'"></i> '+titulo+'</h4>'+
                mensajes+
              '</div>';
            
  $(lugar).html(html); 
}

function mensaje2(tipo, mensaje, lugar) {
  var tipoAlerta, icono, titulo, html, mensajes='';

  if (tipo == 'ok') {
    tipo = 'alert alert-success alert-dismissible';
    icono = 'icon fa fa-check';
    titulo = 'Exito!';
  }else if (tipo == 'error') {
    tipo = 'alert alert-danger alert-dismissible';
    icono = 'icon fa fa-ban';
    titulo = 'Alerta!';
  }

  var html =  '<div class="'+tipo+'">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                '<h4><i class="'+icono+'"></i> '+titulo+'</h4>'+
                mensaje+
              '</div>';
            
  $(lugar).html(html); 
}

</script>