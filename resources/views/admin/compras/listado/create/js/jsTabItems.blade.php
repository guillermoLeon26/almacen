<script>
//---------------------------------SELECT PRODUCTOS-------------------------------------
$('#selectProducto').select2({
  dropdownParent: $('#modalIngresarItems'),
  ajax: {
    id: function (e) {
      return producto.id;
    },
    url: '{{ url('admin/inventario/productos/lista') }}',
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
      console.log(data);
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
              '<img class="img-responsive img-thumbnail" src="'+producto.imagen+'" height="100px" width="50px"/>'+
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
//---------------------------------DIMENIONES----------------------------------------
$('#selectDimension').select2({
  dropdownParent: $('#modalIngresarItems')
});



</script>