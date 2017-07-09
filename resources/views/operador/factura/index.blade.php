@extends ('layouts.oper')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Factura Realizada <a href="factura/create"></a></h3>
		
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Codigo</th>
						<th>Cantidad Disponible</th>
						<th>Fecha</th>
						<th>Monto Dinero</th>
						<th>Detalle</th>
						<th>Hora</th>
						<th>Cliente</th>
						<th>Trabajador</th>
						<th>Placa Vehiculo</th>
						<th>Manguera</th>
					</thead>
					@foreach($facturas as $fac)
					<tr>
						<td>{{$fac->CODIGO_F}}</td>
						<td>{{$fac->CANTIDAD_COMBUSTIBLE}}</td>
						<td>{{$fac->FECHA}}</td>
						<td>{{$fac->MONTO_DINERO}}</td>
						<td>{{$fac->DESCRIPCION}}</td>
						<td>{{$fac->HORA}}</td>
						<td>{{$fac->NOMBRE}} {{$fac->APELLIDO_PATERNO}}</td>
						<td>{{$fac->CI_TRABAJADOR}}</td>
						<td>{{$fac->PLACA_V}}</td>
						<td>{{$fac->ID_MANGUERA}}</td>					
					</tr>
					
					@endforeach
				</table>	
		</div>
		
	</div>
</div>	

@endsection