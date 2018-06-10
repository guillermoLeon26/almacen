<script type="text/javascript">

//--------------------------SELECCIONADO DE CIUDADES-------------------------
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

//----------------------GENERAR TABLA-------------------------
$(document).on('click', '.pagination a', function (e) {
  e.preventDefault();
  var page = $(this).attr('href').split('page=')[1];
  var filtro = $('#buscar').val();
  
  generarTabla(page, filtro);
});

function generarTabla(page, filtro) {
  $.ajax({
    headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
    url: '{{ url('admin/inventario/bodegas/tBodegas') }}',
    type: 'GET',
    data: {'page':page, 'filtro':filtro},
    dataType: 'json',
    beforeSend: function () {
      $('.box').append('<div class="overlay">'+
                         '<i class="fa fa-refresh fa-spin"></i>'+
                       '</div>');
    },
    success: function (data) {
      $('#tBodegas').html(data);
      $('.overlay').detach();
    }
  });
}

//---------------------BUSCAR-------------------------------
$('#buscar').on('keyup', function () {
  var filtro = $('#buscar').val();

  generarTabla(1, filtro);
});

</script>
