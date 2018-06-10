<div class="box-body table-responsive no-padding">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Ciudad</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($bodegas as $bodega)
        <tr>
          <td>{{ $bodega->nombre }}</td>
          <td>{{ $bodega->direccion }}</td>
          <td>{{ $bodega->ciudad() }}</td>
          <td>
            <button class="btn btn-danger" data-toggle="modal" onclick="eliminar({{ $bodega->id }})">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>  
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="box-footer">
  {{ $bodegas->links('vendor.pagination.custom',['maxPages'=>5, 'offset'=>2]) }}
</div>