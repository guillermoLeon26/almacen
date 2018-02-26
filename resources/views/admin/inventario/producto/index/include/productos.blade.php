<div class="box-body table-responsive no-padding">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Imágen</th>
				<th>Categoría</th>
				<th>Código</th>
				<th>Márca</th>
				<th>Editar</th>
			</tr>
		</thead>
			<tbody id="tabla">
				@foreach($productos as $producto)
					<tr>
						<td>
							@if($producto->imagenes->isNotEmpty())
								<img class="img-responsive img-thumbnail" src="{{$producto->imagenes->first()->imagen}}" alt="{{$producto->imagenes->first()->nombre}}" height="100px" width="100px">
							@endif
						</td>
						<td>{{$producto->categoria}}</td>
						<td>{{$producto->codigo}}</td>
						<td>{{$producto->marca}}</td>
						<td>
							<button class="btn btn-primary" onclick="modalDatos({{$producto->id}})">
								Datos
							</button>
							@include('inventario.producto.index.include.btnImagen')
							<button class="btn btn-info" onclick="modalDimensiones({{$producto->id}})">
								Dimensiones
							</button>
							<button class="btn btn-danger" onclick="modalColores({{$producto->id}})">
								Colores
							</button>
						</td>
					</tr>
				@endforeach
			</tbody>
	</table>
</div>

<div class="box-footer">
	{{ $productos->links('vendor.pagination.custom',['maxPages'=>5, 'offset'=>2]) }}
</div>