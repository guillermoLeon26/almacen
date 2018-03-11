<div class="box-body table-responsive no-padding">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Imágen</th>
        <th>Categoría</th>
        <th>Código</th>
        <th>Márca</th>
        <th>Opciones</th>
      </tr>
    </thead>
      <tbody id="tabla">
        @foreach($productos as $producto)
          <tr>
            <td>
              @if($producto->imagenes->isNotEmpty())
                <img class="img-responsive img-thumbnail" src="{{$producto->imagenes->first()->imagen}}" alt="{{$producto->imagenes->first()->nombre}}" height="100px" width="100px">
              @endif
            </td>
            <td>{{$producto->categoria}}</td>
            <td>{{$producto->codigo}}</td>
            <td>{{$producto->marca}}</td>
            <td>
              <button class="btn btn-info" onclick="">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
              </button>
              <button class="btn btn-danger" onclick="">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
  </table>
</div>

<div class="box-footer">
  {{ $productos->links('vendor.pagination.custom',['maxPages'=>5, 'offset'=>2]) }}
</div>