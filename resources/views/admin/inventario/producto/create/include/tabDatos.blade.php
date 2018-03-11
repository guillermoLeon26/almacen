<div class="box box-primary">     
  <div class="box-body">
    <form class="form-horizontal">
      <div class="form-group">
        <label class="col-sm-2 control-label" for="categorias">Categoria</label>
        <div class="col-sm-10">
          <div id="selCategoria">
            @include('admin.inventario.producto.create.include.cbCategoria')
          </div>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label" for="codigo">Codigo</label>
        <div class="col-sm-10" style="padding-bottom: 6px;">
          <input class="form-control" type="text" name="codigo" id="codigo">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="marca">Marca</label>
        <div class="col-sm-10">
          <div id="selMarca">
            @include('admin.inventario.producto.create.include.cbMarca')
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="unidad">Unidad</label>
        <div class="col-sm-10">
          <div id="selUnidad">
            @include('admin.inventario.producto.create.include.cbUnidad')
          </div>
        </div>
      </div>

      <div class="form-group" style="padding-top: 6px;">
        <label class="col-sm-2 control-label" for="marca">Descripción</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="descripcion" rows="3" style="margin-top: 6px;"></textarea>
        </div>
      </div>
    </form>
  </div>

</div>