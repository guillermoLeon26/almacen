<script type="text/javascript">

$('#selectCiudades').select2({
	ajax: {
    id: function (e) {
      return ciudad.id;
    },
    url: '{{ url('admin/config/ciudades/ciudades') }}',
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
        results: data.ciudades,
        pagination: {
              more: (params.page * 20) < data.total_count
            }
      };
    }
  },
  cache: true,
  templateResult: templateResultCiudades,
  templateSelection: templateSelectionCiudades,
  dropdownParent: $('#modalNuevo'),
});

function templateResultCiudades (ciudad) {
  if (!ciudad.id) { return ciudad.text; }
    var $ciudad = $(
      '<span>'+
				'<p>'+ciudad.ciudad+'</p>'+
      '</span>'
    );
  return $ciudad;
}

function templateSelectionCiudades(ciudad) {
  if (!ciudad.id) { return ciudad.text; }
  var $ciudad = $(
    '<span>'+
      ciudad.ciudad+
    '</span>'
  );

  return $ciudad;
}

</script>
