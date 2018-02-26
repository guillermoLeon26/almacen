<div class="modal fade" id="mostrarUnidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Actualizar unidad de medida</h4>
      </div>

        <form id="actualizar" class="form-horizontal">
          <div class="modal-body">
            
            <div class="form-group">
              <label for="color" class="col-xs-2 control-label">Unidad</label>
              <div class="col-md-7 col-sm-8 col-xs-12">
                {{ method_field('PUT') }}
                <input class="form-control" type="text" id="unidad" name="unidad">
                <input type="hidden" name="id" id="id">
              </div>
            </div>  

            <div class="form-group">
              <label for="color" class="col-xs-2 control-label">Simbolo</label>
              <div class="col-md-7 col-sm-8 col-xs-12">
                <input class="form-control" type="text" id="simbolo" name="simbolo">
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default cerrar" data-dismiss="modal">Cerrar</button>
            <button id="actualizarUnidad" type="submit" class="btn btn-primary">Actualizar</button>
          </div>
        </form>
    </div>
  </div>
</div>