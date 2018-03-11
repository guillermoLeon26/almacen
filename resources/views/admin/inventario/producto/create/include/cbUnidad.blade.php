<div class="input-group">
  <select class="form-control select2" style="width: 100%;" name="simbolo" id="unidad">
    @foreach($unidades as $unidad)
      <option value="{{ $unidad->simbolo }}">{{ $unidad->unidad }}</option>
    @endforeach
  </select>

  <div class="input-group-btn">
    <button id="btnModalUnidad" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalIngresarUnidad">
      <span class="fa fa-plus" aria-hidden="true"></span>
    </button>
  </div>
</div>
