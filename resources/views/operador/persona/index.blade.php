@extends ('layouts.oper')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Facturas <a href="persona/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Ci</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apeliido Materno</th>
						<th>Tipo de Persona</th>
					</thead>
					@foreach($personas as $per)
					<tr>
						<td>{{$per->CI_NIT_P}}</td>
						<td>{{$per->NOMBRE}}</td>
						<td>{{$per->APELLIDO_PATERNO}}</td>
						<td>{{$per->APELLIDO_MATERNO}}</td>
						<td>{{$per->TIPO_P}}</td>	

					</tr>
					
					@endforeach
				</table>	
		</div>
		{{$personas->render()}}
	</div>
</div>	

@endsection