<script>

$('#selProveedores').select2({
  ajax: {
    id: function (e) {
      return proveedor.id;
    },
    url: '{{ url('admin/compras/proveedores/lista') }}',
    type: 'GET',
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
        filtro: params.term,
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
      proveedor.empresa +
    '</span>'
  );
  return $proveedor;
}

function formatRepoProveedor(proveedor) {
  if (!proveedor.id) { return proveedor.text; }
  var $proveedor = $(
    '<span>'+
      proveedor.nombre_empresa+
        
    '</span>'
  );

  return $proveedor;
}

</script>