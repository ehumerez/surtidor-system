@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Turnos</h3>
		@include('perfil.turno.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Codigo</th>
						<th>Descripcion</th>
						<th>Hora Entrada</th>
						<th>Hora Salida</th>
						
					</thead>
					@foreach($turnos as $per)
					<tr>
						<td>{{$per->CODIGO_T}}</td>
						<td>{{$per->DESCRIPCION}}</td>
						<td>{{$per->HORA_ENTRADA}}</td>
						<td>{{$per->HORA_SALIDA}}</td>	
						
					</tr>
					
					@endforeach
				</table>	
		</div>
		{{$turnos->render()}}
	</div>
</div>	

@endsection