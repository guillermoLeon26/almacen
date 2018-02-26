<div class="modal fade" id="modalColor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close cerrarColor" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <h4 class="modal-title">Colores del producto</h4>

      </div>

        <form id="actualizarColoresProducto" class="form-horizontal">

          <div class="modal-body">

            <div class="box box-primary">
              <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" id="mensajeModalColor"></div>
              
              <div class="box-body">
                <div class="box-body">
                  <form class="form-horizontal">
                    <div class="form-group col-lg-12 co-md-12 col-sm-12 col-xs-12">
                      <label class="col-lg-2 co-md-2 col-sm-2 col-xs-2 control-label">Color</label>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="padding-right: 1px;">
                        <div id="selColor"></div>
                      </div>
                
                      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="padding-left: 0px;">
                        <button id="btnModalColor" type="button" class="btn btn-info">
                          <span class="fa fa-plus" aria-hidden="true"></span>
                        </button>
                      </div>
                    </div>

                  </form>
                </div>

                <div class="box-footer">
                  <button id="btnAgregarColor" type="button" class="btn btn-primary pull-right">Agregar</button>
                </div>
              </div>
            </div>

            <div class="col-xs-12">
              <div id="tablaColores" class="box box-primary"></div>  
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default cerrarColor" data-dismiss="modal">Cerrar</button>
          </div>
        </form>
        
    </div>
  </div>
</div>