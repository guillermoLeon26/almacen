<script>

$('#selProveedores').select2({
  ajax: {
    id: function (e) {
      return proveedor.id;
    },
    url: '{{ url('contabilidad/proveedores') }}',
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
        results: data.proveedores,
        pagination: {
              more: (params.page * 20) < data.total_count
            }
      };
    }
  },
  cache: true,
  templateResult: formatProveedor,
  templateSelection: formatRepoProveedor
}); 


function formatProveedor (proveedor) {
  if (!proveedor.id) { return proveedor.text; }
  var $proveedor = $(
      '<span>'+
      '<table>'+
        '<tbody>'+
          '<tr>'+
            '<td>'+
              '<strong>Proveedor: </strong> '+ proveedor.nombre_empresa +
            '</td>'+
          '</tr>'+

          '<tr>'+
            '<td>'+
              '<strong>Tipo: </strong> '+ tipo(proveedor.tipo) +
            '</td>'+
          '</tr>'+
        '</thead>'+
      '</tbody>'+
    '</span>'
  );
  return $proveedor;
}

function formatRepoProveedor(proveedor) {
  if (!proveedor.id) { return proveedor.text; }
  var $proveedor = $(
        '<span>'+
        proveedor.nombre_empresa+
        ' (' + tipo(proveedor.tipo) + ')'+
      '</span>'
  );

  return $proveedor;
}

</script>