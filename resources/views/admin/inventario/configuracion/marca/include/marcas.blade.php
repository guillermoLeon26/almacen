<div class="box-body table-responsive no-padding">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Marcas</th>
				<th>Opciones</th>
			</tr>
		</thead>
			<tbody id="tabla">
				@foreach($marcas as $marca)
					<tr>
						<td>{{$marca->marca}}</td>
						<td>
							<button class="btn btn-danger" data-toggle="modal" onclick="eliminar({{$marca->id}})">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
						</td>
					</tr>
				@endforeach
			</tbody>
	</table>
</div>

<div class="box-footer">
	{{ $marcas->links('vendor.pagination.custom',['maxPages'=>5, 'offset'=>2]) }}
</div>