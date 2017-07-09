@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Turno de Traabajadores<a href="trabajadorturno/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('perfil.trabajadorturno.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Ci Trabajador</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Codigo Turno</th>
						<th>Descripcion Turno</th>
						<th>Hora Entrada</th>
						<th>Hora Salida</th>
					</thead>
					@foreach($trabajadorturnos as $per)
					<tr>
						<td>{{$per->ID_TT}}</td>
						<td>{{$per->CI_TRABAJADOR}}</td>
						<td>{{$per->NOMBRE}}</td>
						<td>{{$per->APELLIDO_PATERNO}}</td>
						<td>{{$per->CODIGO_TURNO}}</td>
						<td>{{$per->DESCRIPCION}}</td>
						<td>{{$per->HORA_ENTRADA}}</td>
						<td>{{$per->HORA_SALIDA}}</td>
					</tr>
					
					@endforeach
				</table>	
		</div>
		
	</div>
</div>	

@endsection