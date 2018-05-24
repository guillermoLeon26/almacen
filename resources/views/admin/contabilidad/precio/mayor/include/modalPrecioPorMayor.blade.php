<div class="modal fade" id="modalPrecioPorMayor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <h4 class="modal-title">Precio al por mayor</h4>

      </div>

        <div class="col-xs-12" id="mensajeModalPrecioPorMayor"></div>
        
        <form id="formPrecioPorMayor" class="form-horizontal">

          <div class="modal-body">

            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Costo</label>
              <div class="col-sm-10 input-group">
                <span class="input-group-addon"><strong>$</strong></span>
                <input id="costo" type="number" step="0.01" name="costo" class="form-control ingreso-numero">
              </div>
            </div>

            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Ganancia</label>
              <div class="col-sm-10 input-group">
                <span class="input-group-addon"><strong>$</strong></span>
                <input id="ganancia" type="number" step="0.01" name="ganancia_por_mayor" class="form-control ingreso-numero">
                <span class="input-group-addon"><strong>%</strong></span>
                <input id="porGanancia" type="number" step="0.01" name="porcentaje_ganancia_por_mayor" class="form-control">
              </div>
            </div>

            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">IVA</label>
              <div class="col-sm-10 input-group">
                <span class="input-group-addon"><strong>$</strong></span>
                <input id="resIVA" type="number" step="0.01" class="form-control" disabled>
              </div>
            </div>

            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Descuento</label>
              <div class="col-sm-10 input-group">
                <span class="input-group-addon"><strong>$</strong></span>
                <input id="descuento" type="number" step="0.01" name="descuento_por_mayor" class="form-control ingreso-numero">
                <span class="input-group-addon"><strong>%</strong></span>
                <input id="porDescuento" type="number" step="0.01" name="porcenaje_descuento_por_mayor" class="form-control">
              </div>
            </div>

            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Precio</label>
              <div class="col-sm-10 input-group">
                <span class="input-group-addon"><strong>$</strong></span>
                <input id="resPrecio" type="number" step="0.01" name="precio_por_mayor_inc_iva" class="form-control" disabled>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default cerrar" data-dismiss="modal">Cerrar</button>
            <button id="btnGuardarPrecioPorMayor" type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
        
    </div>
  </div>
</div>