<form method="GET" action="{{url('inventario/producto/imagen')}}/{{$producto->id}}" style="display: inline;">
	{{ csrf_field() }}
	<button type="submit" class="btn btn-success">
		Imagenes
	</button>
</form>