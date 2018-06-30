<div class="modal fade" id="modalIngresarPagos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Nuevo Pago</h4>
      </div>
        
      <form class="form-horizontal">
        <div class="modal-body">

          <div class="form-group col-sm-12">
            <label class="col-sm-4 control-label">Fecha de Pago</label>
            <div class="col-sm-8">
              <div class="input-group date">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <input type="text" class="form-control pull-right fecha" id="fechaPago">
              </div>
            </div>
          </div>

          <div class="form-group col-sm-12">
            <label class="col-sm-4 control-label">Tipo de Pago</label>
            <div class="col-sm-8">
              <select id="tipoPago" class="form-control select2" style="width: 100%">
                
              </select>
            </div>
          </div>

          <div class="form-group col-sm-12">
            <label class="col-sm-4 control-label">Numero de documento</label>
            <div class="col-sm-8">
              <input id="numeroDocumento" type="text" class="form-control">
            </div>
          </div>

          <div class="form-group col-sm-12">
            <label class="col-sm-4 control-label">Monto</label>
            <div class="col-sm-8">
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input id="montoPago" min="1" step="0.01" required type="number" class="form-control">
              </div>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default cerrar" data-dismiss="modal">Cerrar</button>
          <button id="btnGuardarPago" type="button" class="btn btn-primary">Ingresar</button>
        </div>
      </form>
        
    </div>
  </div>
</div>