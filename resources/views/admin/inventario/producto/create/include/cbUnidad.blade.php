<select class="form-control select2" style="width: 100%;" name="simbolo" id="unidad">
	@foreach($unidades as $unidad)
		<option value="{{ $unidad->simbolo }}">{{ $unidad->unidad }}</option>
	@endforeach
</select>