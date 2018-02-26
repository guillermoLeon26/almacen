<div class="box box-primary">
	
	<div class="box-body table-responsive no-padding">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Imagen</th>
					<th>Producto</th>
					<th>Marca</th>
					<th>Dimensión</th>
					<th>Color</th>
					<th>Cantidad</th>
					<th>Enviar</th>
				</tr>
			</thead>

			<tbody>
				@foreach($compra->items as $item)
					@if($item->cantidadDisponible() > 0)
						<tr>
							<td>
								<img  class="img-responsive img-thumbnail" width="50px" src="{{ $item->producto()->imagenes->first()->imagen }}" >
							</td>
							<td>{{ $item->producto()->categoria }}</td>
							<td>{{ $item->producto()->marca }}</td>
							<td>{{ $item->stock()->dimension }}</td>
							<td>{{ $item->color() }}</td>
							<td>{{ $item->cantidadDisponible() }}</td>
							<td>
								<input type="hidden" class="items_compras_id" value="{{ $item->id }}">
								<input type="hidden" class="product_id" value="{{ $item->producto()->id }}">
								<input type="hidden" class="product_stock_id" value="{{ $item->product_stock }}">
								<input type="hidden" class="stock_id" value="{{ $item->stock()->id }}">
								<input type="hidden" class="color" value="{{ $item->color() }}">
								<input type="hidden" class="cantidadDisponible" value="{{ $item->cantidadDisponible() }}">
								<input type="text" class="cantidad" value="0">
							</td>
						</tr>
					@endif
				@endforeach
			</tbody>
		</table>
	</div>
</div>
