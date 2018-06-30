<div class="box box-primary">
  <div class="box-header">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalIngresarItems">
      <i class="glyphicon glyphicon-plus"></i>
    </button>
  </div>

  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Opciones</th>
          <th>Imagen</th>
          <th>Producto</th>
          <th>Marca</th>
          <th>Dimensión</th>
          <th>Color</th>
          <th>Precio Unitario</th>
          <th>Cantidad</th>
          <th>Total</th>
        </tr>
      </thead>

      <tbody id="tablaItems">
      </tbody>

      <tfoot id="datosCompras">
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <th>Sub Total</th>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><strong>$</strong></span>
              <input id="subTotalCompra" class="form-control" value="0" disabled>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <th>Monto No Facturado</th>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><strong>$</strong></span>
              <input id="montoSinIva" name="monto_no_facturado" class="form-control" value="0">
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <th>Monto Facturado</th>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><strong>$</strong></span>
              <input id="montoConIva" name="monto_facturado" class="form-control" value="0" disabled>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <th>IVA</th>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><strong>$</strong></span>
              <input id="iva" name="iva_compra" class="form-control" value="0" disabled>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <th>Total</th>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><strong>$</strong></span>
              <input id="totalCompra" class="form-control" value="0" disabled>
            </div>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
