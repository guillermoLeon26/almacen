<div class="box box-warning">
  <div class="box-header">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalIngresarPagos">
      <i class="glyphicon glyphicon-plus"></i>
    </button>

    <div class="box-tools">
      <div class="input-group input-group" style="width: 250px;">
        <span class="input-group-addon">Total a pagar:</span>
        <input type="text" id="totalApagar" class="form-control pull-right" disabled="disabled">
      </div>
    </div>
  </div>

  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Opciones</th>
          <th>Fecha de Pago</th>
          <th>Tipo de Pago</th>
          <th>Numero de documento</th>
          <th>Monto</th>
        </tr>
      </thead>

      <tbody id="tablaPagos"></tbody>

      <tfoot></tfoot>
    </table>

  </div>
</div>
