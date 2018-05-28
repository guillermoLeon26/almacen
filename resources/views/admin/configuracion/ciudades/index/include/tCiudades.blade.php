<div class="box-body table-responsive no-padding">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Ciudad</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($ciudades as $ciudad)
        <tr>
          <td>{{ $ciudad->ciudad }}</td>
          <td>
            <button class="btn btn-danger" data-toggle="modal" onclick="eliminar({{ $ciudad->id }})">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>  
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="box-footer">
  {{ $ciudades->links('vendor.pagination.custom',['maxPages'=>5, 'offset'=>2]) }}
</div>