<div class="box box-warning">
  
  <div class="box-header">
    <div class="form-group col-xs-12">
      <label class="col-sm-2 control-label">Total a pagar</label>
      <div class="col-sm-10">
        <div class="input-group">
          <span class="input-group-addon">$</span>
          <input id="total" name="total" type="text" class="form-control" value="0" disabled>
        </div>
      </div>
    </div>

    <div class="form-group col-xs-12">
      <label class="col-sm-2 control-label">Plazo</label>
      <div class="col-sm-8">
        <div class="col-xs-9" style="padding-right: 0px; padding-left: 0px;">
          <input type="text" class="form-control" name="valor_plazo">
        </div>
        
        <div class="col-xs-3" style="padding-right: 0px; padding-left: 0px;">
          <select id="selectTiempoPlazo" name="tiempo_plazo" class="form-control" style="padding: 0px;">
            <option value="Dias">Dias</option>
            <option value="Meses">Meses</option>
            <option value="Anios">Años</option>
          </select>   
        </div>            
      </div>
    </div>

    <div class="form-group col-xs-12">
      <label class="col-sm-2 control-label">Vencimiento</label>
      <div class="col-sm-10">
        <div class="input-group date">
          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
          <input type="text" class="form-control pull-right fecha" id="fechaVencimiento" name="fecha_vencimiento">
        </div>
      </div>
    </div>
  </div>

  
  
</div>

<div class="box box-warning">
  <div class="box-header">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalIngresarPagos">
      <i class="glyphicon glyphicon-plus"></i>
    </button>
  </div>

  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Fecha de Pago</th>
          <th>Tipo de Pago</th>
          <th>Numero de documento</th>
          <th>Monto</th>
          <th>Opciones</th>
        </tr>
      </thead>

      <tbody id="tablaPagos">
        
      </tbody>
    </table>

  </div>
</div>
