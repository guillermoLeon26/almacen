<div class="box box-primary">
  <div class="box-header">
    <h2 class="box-title">Dimensiones</h2>

    <div class="box-tools">
      <div class="input-group" style="width: 300px;">
        <input class="form-control" type="text" name="dimension" id="txtDimension">

        <div class="input-group-btn">
          <button id="btnAgregarDimensionTabla" type="button" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="box-body table-resposive no-padding">
    <table class="table table-hover">
      <thead>
        <tr>
          <th></th>
          <th>Dimensiones</th>
          <th>Opciones</th>
        </tr>
      </thead>

      <tbody id="trTablaDimension">
        @foreach($producto->listaDescripciones() as $descripcion)
          <tr id="filaDimension{{$descripcion->n_orden}}">
            <td>
              <button onclick="moverArribaFilaDimension({{$descripcion->n_orden}})" type="button" class="btn btn-warning">
                <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
              </button>

              <button onclick="moverAbajoFilaDimension({{$descripcion->n_orden}})" type="button" class="btn btn-warning">
                <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
              </button>
            </td>
            <td>
              <input type="hidden" class="dimensiones" value="{{$descripcion->id}}">
              <input type="hidden" class="dimensionesActuales" value="{{$descripcion->id}}">
              <input type="hidden" name="id" class="descripcion{{$descripcion->id}}" value="{{$descripcion->id}}">
              <input type="hidden" name="dimension" class="descripcion{{$descripcion->id}}" value="{{$descripcion->dimension}}">
              <input type="hidden" name="n_orden" class="descripcion{{$descripcion->id}}" value="{{$descripcion->n_orden}}">
              {{$descripcion->dimension}}
            </td>
            <td>
              <button onclick="eliminarFilaDimension({{$descripcion->n_orden}})" type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
