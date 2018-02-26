<div class="modal fade" id="modalIngresarImagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

        <h4 class="modal-title">Colores del producto</h4>

      </div>
        <form id="formImgresarImagen" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="col-xs-12" id="mensajeModalColor"></div>
          
            <div class="form-group">
              <label class="control-label">Color</label>
              <input type="hidden" id="idProducto" name="product_id" value="{{ $producto->id }}">
              <select id="comboBoxColor" name="color" class="form-control select2" style="width: 100%;">
                @foreach($producto->colores as $color)
                  <option value="{{ $color }}">{{ $color }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Selecione una imagen</label>
              <input id="imagenIngresar" name="imagen" type="file" class="file" data-show-upload="false">
            </div>
          
          </div>

          <div class="modal-footer">
            <button id="btnIngresaImagen" type="submit" class="btn btn-success">Ingresar</button>
            <button type="button" class="btn btn-default cerrar" data-dismiss="modal">Cerrar</button>
          </div>

        </form>
        
    </div>
  </div>
</div>