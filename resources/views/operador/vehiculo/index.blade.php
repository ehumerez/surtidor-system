@extends ('layouts.oper')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Verificacion de B-SISA<a href="articulo/create"></a></h3>
		<H3></H3><H3></H3>
		@include('operador.vehiculo.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
				
					<thead>
						<th>Placa</th>
						<th>Color</th>
						<th>Servicio</th>
						<th>Imagen</th>
						<th>Estado</th>
					</thead>
					@foreach($vehiculos as $veh)
					<tr>
						<td>{{$veh->PLACA}}</td>
						<td>{{$veh->COLOR}}</td>
						<td>{{$veh->SERVICIO}}</td>
						<td>
							<img src="{{asset('imagenes/vehiculos/'.$veh->IMAGEN)}}" alt="{{$veh->PLACA}}" height="120px" width="130px" class="img-thumbnail">
						</td>
						<td>{{$veh->CONDICION}}</td>
										
					</tr>
					
					@endforeach
				</table>	
		</div>
		
	</div>
</div>	






@endsection