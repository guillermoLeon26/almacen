<div class="box-body table-responsive no-padding">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Mover</th>
        <th>Imagen</th>
        <th>Color</th>
        <th>Eliminar</th>
      </tr> 
    </thead>
        
    <tbody>
      @foreach($imagenes as $imagen)
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
            <img class="img-responsive img-thumbnail" src="{{ $imagen->imagen }}" alt="" height="100px" width="100px">
          </td>

          <td>
            {{ $imagen->color() }}
          </td>

          <td>
            <button type="button" class="btn btn-danger" onclick="eliminar({{ $imagen->id }})">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>          
</div>

<div class="box-footer">
  {{ $imagenes->links('vendor.pagination.custom',['maxPages'=>5, 'offset'=>2]) }}
</div>
