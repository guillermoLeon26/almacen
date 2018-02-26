<div class="modal fade" id="eliminarColor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar color</h4>
      </div>
        <form id="eliminar" class="form-horizontal">
          {{ method_field('DELETE') }}
          <div class="modal-body">
            <div class="form-group">
              <div class="col-md-7 col-sm-8 col-xs-12">
                <input type="hidden" name="id" id="eliminarId">
                <h4>¿Desea eliminar el color?</h4>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
          </div>
        </form>
    </div>
  </div>
</div>