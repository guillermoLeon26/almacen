<div class="input-group" style="padding-bottom: 6px;">
  <select class="form-control select2" style="width: 100%;" name="marca" id="marca">
    @foreach($marcas as $marca)
      <option value="{{ $marca->marca }}">{{ $marca->marca }}</option>
    @endforeach
  </select>

  <div class="input-group-btn">
    <button id="btnModalMarca" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalIngresarMarca">
      <span class="fa fa-plus" aria-hidden="true"></span>
    </button>
  </div>  
</div>
