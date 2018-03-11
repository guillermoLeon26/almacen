<div class="modal fade" id="modalIngresarUnidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Ingresar Unidad</h4>
      </div>

      <form id="formIngresoUnidad" class="form-horizontal">
        <div class="modal-body">
          <div class="form-group">
            <label class="col-sm-2 control-label">Unidad</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="unidad">
            </div>
          </div>  
          <div class="form-group">
            <label for="color" class="col-sm-2 control-label">Simbolo</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="simbolo">
            </div>
          </div>
        </div> 
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button id="btnIngresoUnidad" type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>