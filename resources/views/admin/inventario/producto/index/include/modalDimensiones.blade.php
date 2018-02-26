<div class="modal fade" id="modalDimensiones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <div class="modal-title">
          <h4>Dimensiones</h4>
          <div class="col-xs-12" id="mensajeModalDimensiones"></div>
        </div>

      </div>

        <div class="modal-body">

            <form id="formAgregarDimension" class="form-horizontal">
              <label class="col-xs-4 control-label" for="dimension">Dimension</label>
              <input type="hidden" name="product_id" id="idProducto">
              <div class="col-xs-5">
                <input class="form-control" type="text" name="dimension" id="txtDimension">
              </div>
              <div class="col-xs-12">
                <button type="submit" class="btn btn-success">Agregar</button>
              </div>
            </form>

        </div>
        <br><br><br><br>

        <div class="modal-footer">
          <div class="box box-primary">
              
            
              <div class="box-body table-resposive no-padding">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Dimensiones</th>
                    </tr>
                  </thead>

                  <tbody id="tbodyTablaDimension"></tbody>
                </table>
              </div>
            
                
              <br>
              
          </div>
        
        
          <button type="button" class="btn btn-default cerrar" data-dismiss="modal">Cerrar</button>  
        
    </div>
  </div>
</div>