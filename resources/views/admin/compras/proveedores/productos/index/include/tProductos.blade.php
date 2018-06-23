<div class="box-body table-responsive no-padding">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Marca</th>
        <th>Descripcion</th>
        <th>Opciones</th>
      </tr>
    </thead>
    
    <tbody>
      @foreach($productos as $producto)
        <tr>
          <td>{{ $producto->marca }}</td>
          <td>{{ $producto->descripcion }}</td>
          <td>
            <button class="btn btn-danger" onclick="eliminar({{$producto->id}})">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button> 
          </td>
        </tr>
      @endforeach       
    </tbody>
  </table>

  <div class="box-footer">
    {{ $productos->links('vendor.pagination.custom',['maxPages'=>5, 'offset'=>2]) }}
  </div>        
</div>