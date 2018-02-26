<div class="box-body table-responsive no-padding">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>FECHA</th>
				<th>FACTURA</th>
				<th>OPCIONES</th>
			</tr>
		</thead>
		
		<tbody>
			@foreach($compras as $compra)
				<tr>
					<td>{{ $compra->fecha() }}</td>
					<td>{{ $compra->factura }}</td>
					<td>
						<a class="btn btn-success" href="{{url('inventario/enviosCompras/'.$compra->id)}}">
							<span class="fa fa-truck" aria-hidden="true"></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="box-footer">
		{{ $compras->links('vendor.pagination.custom',['maxPages'=>5, 'offset'=>2]) }}
	</div>				
</div>