<div class="box box-primary">
  <div class="box-header">
    <h2 class="box-title">Colores</h2>

    <div class="box-tools">
      <div class="input-group" style="width: 300px;">
        <div id="selColor">
          @include('admin.inventario.producto.create.include.cbColor')
        </div>

        <div class="input-group-btn">
          <button id="btnModalColor" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalIngresarColor">
            <span class="fa fa-plus" aria-hidden="true"></span>
          </button>

          <button id="btnAgregarColorTabla" type="button" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="box-body table-resposive no-padding">
    <table class="table table-hover table-condensed">
      <thead>
        <tr>
          <th>Color</th>
          <th>Opciones</th>
        </tr>
      </thead>

      <tbody id="trTablaColores"></tbody>
    </table>
  </div>
</div>
