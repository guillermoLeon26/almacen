<div class="modal fade" id="modalBuscar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <h4 class="modal-title">Buscar Compras</h4>

        <div class="col-xs-12" id="mensajeModalBuscar"></div>

      </div>
        
        <form id="formBuscar" class="form-horizontal">

          <div class="modal-body">

            <div class="form-group">
              <label class="col-sm-3 control-label">Rango de Fechas</label>
              <div class="col-sm-9">
                <div class="input-group date">
                  <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                  <div class="input-group-addon">Inicial</div>
                  <input type="text" class="form-control pull-right fecha" name="fechaInicial">
                  <div class="input-group-addon">Final</div>
                  <input type="text" class="form-control pull-right fecha" name="fechaFinal">
                </div>
              </div>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default cerrar" data-dismiss="modal">Cerrar</button>
            <button id="btnBuscar" type="submit" class="btn btn-primary">Buscar</button>
          </div>
        </form>
        
    </div>
  </div>
</div>