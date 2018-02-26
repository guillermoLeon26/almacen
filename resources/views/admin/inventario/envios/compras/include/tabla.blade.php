<div class="box-body table-responsive no-padding">
	<table class="table table-hover">
		<thead>
			<tr>
				<th rowspan="2">CODIGO</th>
				<th rowspan="2">FECHA</th>
				<th colspan="2">LUGAR DE ENVIO</th>
				<th rowspan="2">OPCIONES</th>
			</tr>

			<tr>
				<th>DIRECCION</th>
				<th>CIUDAD</th>
			</tr>
		</thead>
		
		<tbody>
			@foreach($envios as $envio)
				<tr>
					<td>{{ $envio->id }}</td>
					<td>{{ $envio->fecha() }}</td>
					<td>{{ $envio->store()->direccion }}</td>
					<td>{{ $envio->store()->ciudad }}</td>
					<td>
						<button class="btn btn-success" onclick="ver({{ $envio->id }})"><i class="fa fa-eye"></i></button>

						<button type="button" class="btn btn-danger">
							<i class="glyphicon glyphicon-trash"></i>
						</button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="box-footer">
		{{ $envios->links('vendor.pagination.custom',['maxPages'=>5, 'offset'=>2]) }}
	</div>				
</div>