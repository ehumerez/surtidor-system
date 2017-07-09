@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Estado de Inventario   <a href=""><button class="btn btn-success">Nuevo   Inventario </button></a></h3>
		@include('almacen.inventario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Cantidad Disponible</th>
						<th>Codigo Combustible</th>
						<th>Descripcion de Combustible</th>
						<th>Precio de Compra</th>
						<th>Precio de Venta</th>
					@foreach($inventarios as $inv)
						<tr>
						<td>{{$inv->ID_I}}</td>
						<td>{{$inv->CANTIDAD_DISPONIBLE}}</td>
						<td>{{$inv->CODIGO_COMBUSTIBLE}}</td>
						<td>{{$inv->DESCRIPCION}}</td>
						<td>{{$inv->PRECIO_COMPRA}}</td>
						<td>{{$inv->PRECIO_VENTA}}</td>
											
						</tr>
					
					@endforeach
					</thead>
					
				</table>	
		</div>
		
	</div>
</div>	

@endsection