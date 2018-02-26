<div class="modal fade" id="modalDatos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <h4 class="modal-title">Datos del producto</h4>

      </div>

        <form id="actualizarDatosProducto" class="form-horizontal">
          <div class="modal-body">

            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" id="mensajeModalDatos"></div>

            <div class="form-group">
              <label class="col-sm-2 col-xs-12 control-label" for="categorias">Categoría</label>
              <div class="col-xs-9" style="padding-right: 1px;">
                <div id="selCategoria"></div>
              </div>
        
              <div class="col-xs-1" style="padding-left: 0px;">
                <button id="btnModalCategoria" type="button" class="btn btn-info">
                  <span class="fa fa-plus" aria-hidden="true"></span>
                </button>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-xs-12 control-label" for="marca">Código</label>
              <div class="col-sm-9 col-xs-12">
                <input class="form-control" type="text" name="codigo" id="codigo">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-xs-12 control-label" for="marca">Marca</label>
              <div class="col-xs-9" style="padding-right: 1px;">
                <div id="selMarca"></div>
              </div>

              <div class="col-xs-1" style="padding-left: 0px;">
                <button id="btnModalMarca" type="button" class="btn btn-info">
                  <span class="fa fa-plus" aria-hidden="true"></span>
                </button>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-xs-12 control-label" for="unidad">Unidad</label>
              <div class="col-xs-9" style="padding-right: 1px;">
                <div id="selUnidad"></div>
              </div>
              
              <div class="col-xs-1" style="padding-left: 0px;">
                <button id="btnModalUnidad" type="button" class="btn btn-info">
                  <span class="fa fa-plus" aria-hidden="true"></span>
                </button>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-xs-12 control-label" for="marca">Descripción</label>

              <div class="col-xs-9" style="padding-left: 1px;">
                <textarea id="descripcion" class="form-control" name="descripcion" rows="3" style="margin-left: 12px;"></textarea>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default cerrar" data-dismiss="modal">Cerrar</button>
            <button id="btnModificarDatosProducto" type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
        
    </div>
  </div>
</div>