<div class="box-body table-responsive no-padding">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Empresa</th>
				<th>Telefono</th>
				<th>Correo</th>
				<th>Dirección</th>
				<th>Ciudad</th>
				<th>Provincia</th>
				<th>País</th>
				<th>Opciones</th>
			</tr>
		</thead>
		
		<tbody>
			@foreach($proveedores as $proveedor)
				<tr>
					<td>{{ $proveedor->empresa }}</td>
					<td>{{ $proveedor->telefono }}</td>
					<td>{{ $proveedor->correo }}</td>
					<td>{{ $proveedor->direccion }}</td>
					<td>{{ $proveedor->ciudad }}</td>
					<td>{{ $proveedor->provincia }}</td>
					<td>{{ $proveedor->pais }}</td>
					<td>
						<button class="btn btn-info" onclick="editar({{ $proveedor->id }})">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</button>
						<a class="btn btn-primary" href="{{ url('contabilidad/proveedores/contacto').'/'. $proveedor->id }}">
							<span class="fa fa-users" aria-hidden="true"></span>
						</a>
						<a class="btn btn-warning" href="{{ url('contabilidad/proveedores/producto').'/'. $proveedor->id }}">
							<span class="glyphicon glyphicon-apple" aria-hidden="true"></span>
						</a>
					</td>
				</tr>
			@endforeach				
		</tbody>
	</table>

	<div class="box-footer">
		{{ $proveedores->links('vendor.pagination.custom',['maxPages'=>5, 'offset'=>2]) }}
	</div>				
</div>