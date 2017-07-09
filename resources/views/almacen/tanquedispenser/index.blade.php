@extends ('layouts.admin')
@section ('contenido')



<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Detalle Mangueras <a href="tanquedispenser/create"><button class="btn btn-success">Crear Nuevo Tanque </button></a></h3>
		@include('almacen.tanquedispenser.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>ID Tanque</th>
						<th>ID Dispenser</th>
						<th>ID Manguera</th>
						<th>Opcion</th>

					@foreach($tanquedispensers as $tan)
						<tr>
						<td>{{$tan->ID_TB}}</td>
						<td>{{$tan->ID_TANQUE}}</td>
						<td>{{$tan->ID_DISPENSER}}</td>
						<td>{{$tan->ID_MANGUERA}}</td>
						<td>
								<a href="{{URL::action('InventarioController@edit',$tan->ID_TB)}}"><button class="btn btn-info">Editar</button></a>
								
						</td>					
						</tr>
					
					@endforeach

					</thead>
					
				</table>	
		</div>
		
	</div>
</div>	

@endsection