        <div class="box box-primary">
  
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Imagen</th>
                  <th>Producto</th>
                  <th>Marca</th>
                  <th>Dimensión</th>
                  <th>Color</th>
                  <th>Cantidad</th>
                  
                </tr>
              </thead>

              <tbody>
                @foreach($envio->items as $item)
                  <tr>
                    <td>
                      <img  class="img-responsive img-thumbnail" width="50px" src="{{ $item->producto->imagenes->first()->imagen }}" >
                    </td>
                    <td>{{ $item->producto->categoria }}</td>
                    <td>{{ $item->producto->marca }}</td>
                    <td>{{ $item->stock->dimension }}</td>
                    <td>{{ $item->color }}</td>
                    <td>{{ $item->contidad }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          
        </div>