<div class="box-body table-responsive no-padding">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Unidad</th>
				<th>Simbolo</th>
				<th>Opciones</th>
			</tr>
		</thead>
			<tbody id="tabla">
				@foreach($unidades as $unidad)
					<tr>
						<td>{{$unidad->unidad}}</td>
						<td>{{$unidad->simbolo}}</td>
						<td>
							<button class="btn btn-info" data-toggle="modal" onclick="mostrar({{$unidad->id}})">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</button>
							<button class="btn btn-danger" data-toggle="modal" onclick="eliminar({{$unidad->id}})">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
						</td>
					</tr>
				@endforeach
			</tbody>
	</table>
</div>

<div class="box-footer">
	{{ $unidades->links('vendor.pagination.custom',['maxPages'=>5, 'offset'=>2]) }}
</div>