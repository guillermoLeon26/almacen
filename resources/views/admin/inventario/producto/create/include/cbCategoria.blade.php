<div class="input-group" style="padding-bottom: 6px;">
  <select class="select2" style="width: 100%;" multiple name="categorias[]" id="categorias">
    @foreach($categorias as $categoria)
      <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
    @endforeach
  </select>

  <div class="input-group-btn">
    <button id="btnModalCategoria" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalIngresarCategoria">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
  </div>
</div>
