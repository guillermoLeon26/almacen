<select class="form-control select2" style="width: 100%;" name="marca" id="marca">
	@foreach($marcas as $marca)
		<option value="{{ $marca->marca }}">{{ $marca->marca }}</option>
	@endforeach
</select>		