<select class="form-control select2" style="width: 100%;" id="comboBoxColor">
	@foreach($colores as $color)
		<option value="{{ $color->color }}">{{ $color->color }}</option>
	@endforeach
</select>		