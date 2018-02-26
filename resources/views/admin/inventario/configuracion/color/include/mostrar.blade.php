<div class="modal fade" id="mostarColor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Color</h4>
      </div>
        <form id="actualizar" class="form-horizontal">
          <div class="modal-body">
            <div class="form-group">
              <label for="color" class="col-xs-2 control-label">Color</label>
              <div class="col-md-7 col-sm-8 col-xs-12">
                {{ method_field('PUT') }}
                <input type="hidden" name="id" id="actualizarId">
                <input class="form-control" type="text" name="color" id="actualizarColor">
              </div>
            </div>  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
        </form>
    </div>
  </div>
</div>