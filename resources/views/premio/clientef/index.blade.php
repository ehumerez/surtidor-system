@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Cliente Fiel<a href="clientef/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('premio.clientef.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Ci</th>
						<th>Puntos Acumulados</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Opciones</th>
					</thead>
					@foreach($clientefs as $clf)
						<tr>
						<td>{{$clf->CI_C}}</td>
						<td>{{$clf->PUNTOS_ACUMULADOS}}</td>
						<th>{{$clf->NOMBRE}}</th>
						<th>{{$clf->APELLIDO_PATERNO}}</th>
						<th>{{$clf->APELLIDO_MATERNO}}</th>
							<td>
								<a href="{{URL::action('ClienteFController@edit',$clf->CI_C)}}"><button class="btn btn-info">Editar</button></a>
								<a href=""  data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>					
						</tr>
					
					@endforeach
				</table>	
		</div>
		
	</div>
</div>	

@endsection