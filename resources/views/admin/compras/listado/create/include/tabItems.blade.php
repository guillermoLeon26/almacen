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
          <td style="text-align: left;"><label class="control-label">Tipo</label></td>
          <td>
            <select id="tipoCompra" class="form-control" style="width: 240px;">
              <option value="1" selected="selected">Efectivo</option>
              <option value="2">Credito</option>
            </select>
          </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <th>Sub Total(1)</th>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><strong>$</strong></span>
              <input id="subTotalCompra" class="form-control" value="0" disabled>
            </div>
          </td>
        </tr>
        <tr>
          <td></td>
          <td style="text-align: left; visibility: hidden;">
            <label class="control-label cuentaXPagar">Plazo</label>
          </td>
          <td>
            <div class="input-group cuentaXPagar" style="visibility: hidden;">
              <input type="number" id="plazo" name="plazo" class="form-control" value="0" style="width: 100%" min="0" step="1">
              <span class="input-group-addon"><strong>Dias</strong></span>
            </div>
          </td>
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
          <td class="cuentaXPagar" style="text-align: left; visibility: hidden;"><label control-label">Vencimiento</label></td>
          <td>
            <div class="form-group cuentaXPagar" style="visibility: hidden;">
              <div class="input-group date">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <input type="text" class="form-control fecha" id="fechaVencimiento" name="fecha_vencimiento" style="width: 100%;">
              </div>
            </div>
          </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <th>Sub Total(2)</th>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><strong>$</strong></span>
              <input id="subtotal2" class="form-control" value="0" disabled>
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
          <th>Abono</th>
          <td>
            <div class="input-group">
              <span class="input-group-addon"><strong>$</strong></span>
              <input id="abono" name="abono" class="form-control" value="0">
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
