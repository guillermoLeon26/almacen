@foreach($producto->imagenes as $imagen)
  <tr>
    <td>
      <button onclick="bajarNumeroOrden({{ $imagen->id }})" type="button" class="btn btn-warning">
        <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
      </button>

      <button onclick="subirNumeroOrden({{ $imagen->id }})" type="button" class="btn btn-warning">
        <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
      </button>
    </td>

    <td>
      <img class="img-responsive img-thumbnail" src="{{ $imagen->imagen }}" alt="{{ $imagen->nombre }}" height="100px" width="100px">
    </td>

    <td>
      {{ $imagen->color }}
    </td>

    <td>
      <button type="button" class="btn btn-danger" onclick="eliminarImagen({{ $imagen->id }}, {{ $imagen->producto->id }})">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
      </button>
    </td>
  </tr>
@endforeach