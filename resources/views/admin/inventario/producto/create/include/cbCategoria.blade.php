<select class="form-control select2" style="width: 100%;" tabindex="-1" aria-hidden="true" multiple name="categorias[]" id="categorias">
	@foreach($categorias as $categoria)
		<option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
	@endforeach
</select>