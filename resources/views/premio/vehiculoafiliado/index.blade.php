@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado Vehiculos Afiliados<a href="vehiculoafiliado/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('premio.vehiculoafiliado.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Ci Cliente</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Placa Vechiculo</th>
					</thead>
					@foreach($vehiculoafiliados as $clf)
						<tr>
						<td>{{$clf->ID_VA}}</td>
						<td>{{$clf->CI_CLIENTE}}</td>
						<td>{{$clf->NOMBRE}}</td>
						<td>{{$clf->APELLIDO_PATERNO}}</td>
						<td>{{$clf->APELLIDO_MATERNO}}</td>
						<th>{{$clf->P_VEHICULO}}</th>					
						</tr>
					
					@endforeach
				</table>	
		</div>
		
	</div>
</div>	

@endsection