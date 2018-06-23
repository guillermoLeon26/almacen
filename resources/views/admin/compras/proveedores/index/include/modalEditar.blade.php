<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <h4 class="modal-title">Nuevo proveedor</h4>

      </div>
        
        <form id="formEditar" class="form-horizontal">

          <div class="modal-body">

            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Nombre</label>
              <div class="col-sm-10">
              	<input type="hidden" id="id" name="id">
                <input type="text" id="empresa" name="empresa" class="form-control">
              </div>
            </div>

            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Telefono</label>
              <div class="col-sm-10">
                <input type="text" id="telefono" name="telefono" class="form-control">
              </div>
            </div>

            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Correo</label>
              <div class="col-sm-10">
                <input type="text" id="correo" name="correo" class="form-control">
              </div>
            </div>

            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Dirección</label>
              <div class="col-sm-10">
                <input type="text" id="direccion" name="direccion" class="form-control">
              </div>
            </div>

            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Ciudad</label>
              <div class="col-sm-10">
                <input type="text" id="ciudad" name="ciudad" class="form-control">
              </div>
            </div>

            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Provincia</label>
              <div class="col-sm-10">
                <input type="text" id="provincia" name="provincia" class="form-control">
              </div>
            </div>

            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Pais</label>
              <div class="col-sm-10">
                <input type="text" id="pais" name="pais" class="form-control">
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