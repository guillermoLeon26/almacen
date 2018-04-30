<div class="box-body table-responsive no-padding">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Colores</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody id="tabla">
      @foreach($colores as $color)
        <tr>
          <td>{{$color->color}}</td>
          <td>
            <button class="btn btn-danger" data-toggle="modal" onclick="eliminar({{$color->id}})">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="box-footer">
  {{ $colores->links('vendor.pagination.custom',['maxPages'=>5, 'offset'=>2]) }}
</div>