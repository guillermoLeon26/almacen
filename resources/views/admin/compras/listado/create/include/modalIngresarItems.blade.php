<div class="modal fade" id="modalIngresarItems" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Nuevo Item</h4>
      </div>
        
      <form class="form-horizontal">
        <div class="modal-body">

          <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">Producto</label>
            <div class="col-sm-10">
              <select id="selectProducto" class="form-control select2" style="width: 100%"></select>
            </div>
          </div>

          <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">Dimensión</label>
            <div class="col-sm-10">
              <select id="selectDimension" class="form-control select2" style="width: 100%"></select>
            </div>
          </div>

          <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">Color</label>
            <div class="col-sm-10">
              <select id="selectColor" class="form-control select2" style="width: 100%"></select>
            </div>
          </div>

          <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">Precio</label>
            <div class="col-sm-10">
              <div class="input-group">
                <span class="input-group-addon"><strong>$</strong></span>
                <input id="precioProducto" min="1" step="0.01" required type="number" class="form-control">
              </div>
              
            </div>
          </div>

          <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">Cantidad</label>
            <div class="col-sm-10">
              <input id="cantProducto" min="1" step="0.01" required type="number" class="form-control">
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default cerrar" data-dismiss="modal">Cerrar</button>
          <button id="btnGuardarItems" type="button" class="btn btn-primary">Ingresar</button>
        </div>
      </form>
        
    </div>
  </div>
</div>