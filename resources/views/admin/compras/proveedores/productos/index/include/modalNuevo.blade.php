<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <h4 class="modal-title">Nuevo Producto</h4>

      </div>
        <form id="formNuevo" class="form-horizontal">
          <div class="modal-body">
            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Marca</label>
              <div class="col-sm-10">
                <input type="text" name="marca" class="form-control">
                <input type="hidden" class="form-control" name="proveedor_id" value="{{ $proveedor_id }}">
              </div>
            </div>

            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Descripción</label>
              <div class="col-sm-10">
                <textarea name="descripcion" rows="3" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
        
    </div>
  </div>
</div>